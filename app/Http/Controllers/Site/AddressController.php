<?php

/**
 * @author TechVillage <support@techvill.org>
 *
 * @contributor Al Mamun <[almamun.techvill@gmail.com]>
 *
 * @created 21-11-2021
 */

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreAddressRequest;
use App\Models\{
    Address,
    Country
};
use Illuminate\Http\Request;
use Auth;
use Modules\GeoLocale\Entities\City;
use Modules\GeoLocale\Entities\Country as GeoLocaleCountry;
use Modules\GeoLocale\Entities\Division;

class AddressController extends Controller
{
    /**
     * address view page
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index()
    {
        $addresses = Address::getAll()->where('user_id', auth()->id());
        $countries = Country::getAll();

        return view('site.myaccount.address.index', compact('addresses', 'countries'));
    }

    /**
     * Address create
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function create()
    {
        $countries = Country::getAll();
        $addresses = Address::getAll()->where('user_id', auth()->id());

        return view('site.myaccount.address.create', compact('countries', 'addresses'));
    }

    /**
     * Store
     *
     * @return \Illuminate\Routing\Redirector
     */
    public function store(StoreAddressRequest $request)
    {
        $request['user_id'] = Auth::user()->id;
        if (! isset($request->is_default)) {
            $request['is_default'] = 1;
        }

        if ((new Address())->store($request->only('user_id', 'first_name', 'last_name', 'email', 'company_name', 'phone', 'address_1', 'address_2', 'state', 'type_of_place', 'country', 'city', 'zip', 'is_default'))) {
            $data = ['status' => 'success', 'message' => __('The :x has been successfully saved.', ['x' => __('Address')])];
        } else {
            $data = ['status' => 'fail', 'message' => __('Something went wrong, please try again.')];
        }

        $this->setSessionValue($data);
        if (isset($request->redirect) && $request->redirect == 'checkout') {
            return redirect()->route('site.checkOut');
        }

        return redirect()->route('site.address');
    }

    /**
     * Edit
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\View\View
     */
    public function edit($id)
    {
        if (! $address = Address::where('id', $id)->where('user_id', auth()->user()->id)->first()) {
            return back()->with('fail', __('Address not found.'));
        }

        $countries = GeoLocaleCountry::select('id', 'name', 'code')->orderBy('name')->get();
        $country = GeoLocaleCountry::where('code', $address->country)->first();
        $states = empty($country) ? [] : $country->divisions()->get();
        $state = ! empty($country)
            ? Division::where('country_id', $country->id)->where('code', $address->state)->first()
            : null;
        $cities = (empty($country) || empty($state))
            ? []
            : City::where('country_id', $country->id)->where('division_id', $state->id)->get();

        return view('site.myaccount.address.edit', compact('address', 'countries', 'states', 'cities'));
    }

    /**
     * Update
     *
     * @param  int  $id
     * @return \Illuminate\Routing\Redirector
     */
    public function update(StoreAddressRequest $request, $id)
    {
        $result = $this->checkExistence($id, 'addresses');
        if ($result['status'] === true) {
            $request['user_id'] = Auth::user()->id;
            if (Address::getAll()->where('id', $id)->where('is_default', 1)->count() > 0) {
                $request['is_default'] = 1;
            }

            $response = (new Address())->updateData($request->all(), $id);
        } else {
            $response = ['status' => 'fail', 'message' => $result['message']];
        }

        $this->setSessionValue($response);

        return redirect()->route('site.address');
    }

    /**
     * Delete
     *
     * @param  int  $id
     * @return \Illuminate\Routing\Redirector
     */
    public function destroy($id = null)
    {
        $result = $this->checkExistence($id, 'addresses');
        if ($result['status'] === true) {
            $response = (new Address())->remove($id);
        } else {
            $response = ['status' => 'fail', 'message' => $result['message']];
        }

        $this->setSessionValue($response);

        return back();
    }

    /**
     * Check default user address
     *
     * @return json $response
     */
    public function checkDefault(Request $request)
    {
        $response['status'] = 0;
        $address = Address::getAll()->where('user_id', $request->user_id)->where('is_default', 1)->first();
        if (! empty($address)) {
            $response['status'] = 1;
        }

        return $response;
    }

    /**
     * make default user address
     *
     * @param  int  $id
     * @return \Illuminate\Routing\Redirector
     */
    public function makeDefault($id)
    {
        $address = Address::find($id);
        if (! $address || $address->user_id != auth()->id()) {
            $this->setSessionValue(['status' => 'fail', 'message' => __('Address not found.')]);

            return redirect()->back();
        }

        $result = (new Address())->updateDefault($id);
        $this->setSessionValue($result);

        return redirect()->back();
    }
}
