<?php

namespace App\Helpers;

/**
 * import component 
 */

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

/**
 * import model 
 */

use App\Models\GeneralSetting\GeneralSetting\GeneralSetting;
use App\Models\User\Access\Access;
use App\Models\Outlet\Outlet;
use App\Models\User\User\User;
use App\Models\User\PinAccess\PinAccess;
use App\Models\Category\Category;
use App\Models\ItemLibrary\Item\Item;
use App\Models\tax\Tax;
use App\Models\Gratuity\Gratuity;
use App\Models\SalesType\SalesType;
use App\Models\Region\IndonesiaProvince\IndonesiaProvince;
use App\Models\Region\IndonesiaCities\IndonesiaCities;
use App\Models\Region\IndonesiaDistrict\IndonesiaDistrict;
use App\Models\Ingredient\IngredientCategory\IngredientCategory;
use App\Models\GeneralSetting\GeneralSettingAssign\GeneralSettingAssign;
use App\Models\Discount\Discount;
use App\Models\ItemLibrary\ItemInventoryVariant\ItemInventoryVariant;
use App\Models\ItemLibrary\ItemCogsVariant\ItemCogsVariant;
use App\Models\Modifier\Modifier\Modifier;
use App\Models\Modifier\ModifierItem\ModifierItem;
use App\Models\Modifier\ModifierOption\ModifierOption;
use App\Models\Ingredient\IngredientLibrary\IngredientLibrary;
use App\Models\Modifier\ModifierIngredient\ModifierIngredient;
use App\Models\Promo\Promo\Promo;
use App\Models\Promo\PromoAssignOutlet\PromoAssignOutlet;
use App\Models\Promo\PromoAssignSalesType\PromoAssignSalesType;
use App\Models\Promo\PromoPurchase\PromoPurchase;
use App\Models\BundlePackage\BundlePackage\BundlePackage;
use App\Models\BundlePackage\BundlePackageAssign\BundlePackageAssign;
use App\Models\BundlePackage\BundlePackageItem\BundlePackageItem;
use App\Models\BundlePackage\BundlePackageMultiple\BundlePackageMultiple;
use App\Models\BusinessInfo\BusinessInfo;
use App\Models\Settings\ReceiptSettings\ReceiptSettings;
use App\Models\Invoice\Invoice\Invoice;

class CheckerHelpers
{

    /**
     * checking pages by level
     * using it when the system has multi user
     */
    public function pageChecker()
    {
        $module = request()->segment(2);
        return redirect(route($module));
    }

    public function generalSettingChecker($param)
    {
        return GeneralSetting::where(['uuid_general_settings' => $param])
            ->orWhere(['setting_name' => $param])
            ->first();
    }

    public function generalSettingAssignChecker($data)
    {
        return GeneralSettingAssign::where($data)->first();
    }

    public function accessChecker($data)
    {
        return Access::where($data)->first();
    }

    public function outletChecker($data)
    {
        return Outlet::select(
            '*',
            DB::raw('CASE WHEN logo IS NULL THEN CONCAT("' . url(path('outlet')) . '/", "blank.png") ELSE CONCAT("' . url(path('outlet')) . '/", logo) END as logo'),
        )
            ->where($data)
            ->first();
    }

    public function userChecker(array $data, string $condition = null)
    {
        $select = DB::raw('uuid_user, contact_verification_code, uuid_access, uuid_outlet, name, email, phone, pin, level,
        CASE WHEN profile_photo_path IS NULL THEN CONCAT("' . url(path('user')) . '/", "blank.png") ELSE CONCAT("' . url(path('user')) . '/", profile_photo_path) END AS profile_photo_path');
        if (is_null($condition)) :
            $process = User::select($select)->where($data)->first();
        else :
            $process = User::select($select)->where([$data, ['deleted_at', '!=', null]])->first();
        endif;
        return $process;
    }

    public function pinAccessChecker($data)
    {
        return PinAccess::select('pin_accesses.*')
            ->join('users', 'pin_accesses.uuid_user', '=', 'users.uuid_user')
            ->where($data)
            ->first();
    }

    public function categoryChecker($data)
    {
        return Category::where($data)->first();
    }

    public function itemChecker($data)
    {
        return Item::select('*', DB::raw('CASE WHEN items.photo IS NULL THEN CONCAT("' . url(path('item')) . '/", "blank.png") ELSE CONCAT("' . url(path('item')) . '/", items.photo) END as photo'),)
            ->where($data)
            ->first();
    }

    public function taxChecker($data)
    {
        return Tax::where($data)->first();
    }

    public function gratuityChecker($data)
    {
        return Gratuity::where($data)->first();
    }

    public function salesTypeChecker($data)
    {
        return SalesType::where($data)->first();
    }

    public function provinsiChecker($data)
    {
        return IndonesiaProvince::where($data)->first();
    }

    public function kotaChecker($data)
    {
        return IndonesiaCities::where($data)->first();
    }

    public function kecamatanChecker($data)
    {
        return IndonesiaDistrict::where($data)->first();
    }

    public function ingredientCategoryChecker($data)
    {
        return IngredientCategory::where($data)->first();
    }

    public function discountChecker($data)
    {
        return Discount::where($data)->first();
    }

    public function itemInventoryVariantChecker($data)
    {
        return ItemInventoryVariant::where($data)->first();
    }

    public function itemCogsVariantChecker($data)
    {
        return ItemCogsVariant::where($data)->first();
    }

    public function modifierChecker($data)
    {
        return Modifier::where($data)->first();
    }

    public function modifierOptionChecker($data)
    {
        return ModifierOption::where($data)->first();
    }

    public function modifierItemChecker($data)
    {
        return ModifierItem::select('modifier_items.*', 'modifier_name', 'product_name')
            ->join('modifiers', 'modifiers.uuid_modifier', '=', 'modifier_items.uuid_modifier')
            ->join('items', 'items.uuid_item', '=', 'modifier_items.uuid_item')
            ->where($data)
            ->first();
    }

    public function daftarBahanChecker($data)
    {
        return IngredientLibrary::select('*', DB::raw('CASE WHEN photo IS NULL THEN CONCAT("' . url(path('ingredient')) . '/", "blank.png") ELSE CONCAT("' . url(path('ingredient')) . '/", photo) END as photo'))
            ->where($data)
            ->first();
    }

    public function modifierIngredientChecker($data)
    {
        return ModifierIngredient::select('modifier_ingredients.*')
            ->join('modifiers', 'modifier_ingredients.uuid_modifier', '=', 'modifiers.uuid_modifier')
            ->where($data)
            ->first();
    }

    public function promoChecker($data)
    {
        return Promo::where($data)->first();
    }

    public function promoAssignSalesOutletChecker($data)
    {
        return PromoAssignOutlet::where($data)->first();
    }

    public function promoAssignSalesTypeChecker($data)
    {
        return PromoAssignSalesType::where($data)->first();
    }

    public function promoPurchaseChecker($data)
    {
        return PromoPurchase::where($data)->first();
    }

    public function bundlePackageChecker($data)
    {
        return BundlePackage::select('*', DB::raw('CASE WHEN bundle_package_image IS NULL THEN CONCAT("' . url(path('bundle')) . '/", "blank.png") ELSE CONCAT("' . url(path('bundle')) . '/", bundle_package_image) END as bundle_package_image'))
            ->where($data)
            ->first();
    }

    public function bundlePackageAssignChecker($data)
    {
        return BundlePackageAssign::where($data)->first();
    }

    public function bundlePackageItemChecker($data)
    {
        return BundlePackageItem::where($data)->first();
    }

    public function bundlePackageMultipleChecker($data)
    {
        return BundlePackageMultiple::where($data)->first();
    }

    public function businessInfoChecker()
    {
        return BusinessInfo::select('*')
            ->selectRaw('(SELECT name FROM indonesia_provinces WHERE id = business_infos.id_province) AS provinsi')
            ->selectRaw('(SELECT name FROM indonesia_districts WHERE id = business_infos.id_district) AS kecamatan')
            ->selectRaw('(SELECT name FROM indonesia_cities WHERE id = business_infos.id_city) AS kota')
            ->selectRaw('CASE WHEN npwp_photo IS NULL THEN CONCAT("' . url(path('npwp')) . '/", "blank.png") ELSE CONCAT("' . url(path('npwp')) . '/", npwp_photo) END as npwp_photo')
            ->first();
    }

    public function receiptSettingChecker($data)
    {
        return ReceiptSettings::where($data)->first();
    }

    public function invoiceChecker($data)
    {
        return Invoice::where($data)->first();
    }
}
