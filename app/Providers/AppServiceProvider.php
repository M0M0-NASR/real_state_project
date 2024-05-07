<?php

namespace App\Providers;

use App\Models\Address;
use App\Models\Contact;
use App\Models\Favourite;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use App\Models\Type;
use App\Models\ProfileInfo;
use App\Models\UserInfo;
use App\Models\property;
use App\Models\Report;
use App\Models\Transaction;
use Symfony\Component\HttpKernel\Profiler\Profile;
use Illuminate\Support\Facades\DB;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {

    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
        Paginator::useBootstrap();
        view()->composer(['AddHome.AddHome','buy.Buy','RentPage.Rent','Search.search','AddHome.Update','Search.SearchResults','AdminPage.profile','HomePage.homeverse'], function ($view) {
            $Payments = DB::table('transactions')->join('properties','Property_ID','=','properties.id')
            ->join('types','TypeID','=','Type_ID')->join('user_infos','user_infos.id','=','Customer_ID')
            ->where('Seller_ID',session('UserId'))
            ->OrderBy('transactions.created_at','desc')
            ->limit(3)->get();
            $view->with(['PropertyType'=>Type::all(),'Payments'=>$Payments]);
        });

        view()->composer(['Profile.profile','HomePage.homeverse'], function ($view) {
            $UserInfo = UserInfo::where('id',session('UserId'))->first();
            $UserProperties = Property::where('Publisher_id',session('UserId'))->Paginate(5);
            $UserFavourites = Favourite::where('user_id',session('UserId'))->Paginate(5);
            $Address = Address::where('UserId',session('UserId'))->OrderBy('created_at','desc')->first();
            $Transactions = Transaction::where('Customer_ID',session('UserId'))->OrderBy('created_at','desc')->get();
            $view->with(['UserInfo'=>$UserInfo , 'UserProperties'=>$UserProperties,'Favourites'=>$UserFavourites,'Address'=>$Address,'Transactions'=>$Transactions]);

        });

        view()->composer(['AdminPage.profile'], function ($view) {
            $UserInfo = UserInfo::paginate(5);
            $Property = Property::paginate(5);
            $Reports = Contact::paginate(5);
            $Payments = DB::table('transactions')->join('properties','Property_ID','=','properties.id')
            ->join('types','TypeID','=','Type_ID')->join('user_infos','user_infos.id','=','Customer_ID')
            ->get();
            $PaymentTotal = DB::table('transactions')->sum('Cash');
            $view->with(['UserInfo'=>$UserInfo , 'Property'=>$Property,'Payments'=>$Payments ,'PaymentTotal'=>$PaymentTotal,'Reports'=>$Reports,'UserNumbers'=>UserInfo::count()]);
        });

    }


}
