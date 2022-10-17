<?php

/**
 * This file is part of the Spryker Commerce OS.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\Wishlist;

use Spryker\Zed\Availability\Communication\Plugin\Wishlist\AvailabilityWishlistItemExpanderPlugin;
use Spryker\Zed\Availability\Communication\Plugin\Wishlist\SellableWishlistItemExpanderPlugin;
use Spryker\Zed\MerchantProductOfferWishlist\Communication\Plugin\Wishlist\ValidMerchantProductOfferAddItemPreCheckPlugin;
use Spryker\Zed\MerchantProductOfferWishlist\Communication\Plugin\Wishlist\ValidMerchantProductOfferUpdateItemPreCheckPlugin;
use Spryker\Zed\MerchantProductOfferWishlist\Communication\Plugin\Wishlist\WishlistProductOfferPreAddItemPlugin;
use Spryker\Zed\MerchantProductWishlist\Communication\Plugin\Wishlist\WishlistMerchantProductPreAddItemPlugin;
use Spryker\Zed\PriceProduct\Communication\Plugin\Wishlist\PriceProductWishlistItemExpanderPlugin;
use Spryker\Zed\PriceProductOffer\Communication\Plugin\Wishlist\PriceProductOfferWishlistItemExpanderPlugin;
use Spryker\Zed\ProductDiscontinued\Communication\Plugin\Wishlist\ProductDiscontinuedAddItemPreCheckPlugin;
use Spryker\Zed\Wishlist\Communication\Plugin\Wishlist\WishlistItemAddItemPreCheckPlugin;
use Spryker\Zed\Wishlist\WishlistDependencyProvider as SprykerWishlistDependencyProvider;

class WishlistDependencyProvider extends SprykerWishlistDependencyProvider
{
    /**
     * @return \Spryker\Zed\WishlistExtension\Dependency\Plugin\AddItemPreCheckPluginInterface[]
     */
    protected function getAddItemPreCheckPlugins(): array
    {
        return [
            new ProductDiscontinuedAddItemPreCheckPlugin(), #ProductDiscontinuedFeature
            new ValidMerchantProductOfferAddItemPreCheckPlugin(),
            new WishlistItemAddItemPreCheckPlugin(),
        ];
    }

    /**
     * @return \Spryker\Zed\WishlistExtension\Dependency\Plugin\WishlistPreAddItemPluginInterface[]
     */
    protected function getWishlistPreAddItemPlugins(): array
    {
        return [
            new WishlistMerchantProductPreAddItemPlugin(),
            new WishlistProductOfferPreAddItemPlugin(),
        ];
    }

    /**
     * @return \Spryker\Zed\WishlistExtension\Dependency\Plugin\WishlistItemExpanderPluginInterface[]
     */
    protected function getWishlistItemExpanderPlugins(): array
    {
        return [
            new PriceProductWishlistItemExpanderPlugin(),
            new PriceProductOfferWishlistItemExpanderPlugin(),
            new AvailabilityWishlistItemExpanderPlugin(),
            new SellableWishlistItemExpanderPlugin(),
        ];
    }

    /**
     * @return array<\Spryker\Zed\WishlistExtension\Dependency\Plugin\UpdateItemPreCheckPluginInterface>
     */
    protected function getUpdateItemPreCheckPlugins(): array
    {
        return [
            new ValidMerchantProductOfferUpdateItemPreCheckPlugin(),
        ];
    }
}
