<div class="col-md-6">
    <div class="card">
        <div class="table-card">
            <div class="row-table">
                <div class="col-auto py-5">
                    <i class="feather icon-cloud-drizzle fa-6x"></i>
                </div>
                <div class="col">
                    <h3>{{ __('Import Dummy Data') }}</h3>
                    <p>{{ __('Seed your database with ease using our dummy data import feature – streamline testing and development effortlessly.') }}</p>
                </div>
            </div>
        </div>
        <div class="border-top px-3 import-button">
            <a href="{{ route('import.dummy') }}" class="d-flex justify-content-between align-items-center">
                <p class="pt-3">{{ __('Proceed to Import') }}</p>
                <i class="feather feather icon-arrow-right f-20"></i>
            </a>
        </div>
    </div>
</div>
