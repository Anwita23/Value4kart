<?php

namespace App\Enums;

abstract class ProductChannel
{
    public static string $MarketPlace = 'market_place';

    public static string $Store = 'store';

    public static string $Pos = 'pos';

    public static string $Invoice = 'invoice';

    public static string $PurchaseOrder = 'purchase_order';

    /**
     * All possible channel values (regardless of module active state).
     * Use for defaults so products can "select all" including inactive channels.
     *
     * @return array<string>
     */
    public static function allChannels(): array
    {
        return [
            self::$MarketPlace,
            self::$Store,
            self::$Pos,
            self::$Invoice,
            self::$PurchaseOrder,
        ];
    }

    /**
     * Active channel values only (based on isActive('SaaS'), isActive('Pos')).
     * Use for validation and for the channel form (only active channels are shown/editable).
     *
     * @return array<string>
     */
    public static function all(): array
    {
        $channels = [];
        if (! isActive('SaaS')) {
            $channels[] = self::$MarketPlace;
            $channels[] = self::$Store;
        }
        if (isActive('Pos')) {
            $channels[] = self::$Pos;
        }
        $channels[] = self::$Invoice;
        $channels[] = self::$PurchaseOrder;

        return $channels;
    }

    /**
     * Labels for active channels only (for display in the channel form).
     *
     * @return array<string, string>
     */
    public static function labels(): array
    {
        $labels = [];
        if (! isActive('SaaS')) {
            $labels['market_place'] = 'Marketplace';
            $labels['store'] = 'Store';
        }
        if (isActive('Pos')) {
            $labels['pos'] = 'POS';
        }
        $labels['invoice'] = 'Invoice';
        $labels['purchase_order'] = 'Purchase Order';

        return $labels;
    }
}
