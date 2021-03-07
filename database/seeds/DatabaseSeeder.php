<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(CategoryTableSeeder::class);
        $this->call(SitesTableSeeder::class);
        $this->call(EmployeeCountTableSeeder::class);
        $this->call(CountryTableSeeder::class);
        $this->call(StateTableSeeder::class);
        $this->call(CityTableSeeder::class);
        $this->call(RoleTableSeeder::class);
        $this->call(PlanTypeSeeder::class);
        $this->call(pricingModelTableSeeder::class);
        $this->call(SubscriptionPlanTableSeeder::class);
        $this->call(ModuleTableSeeder::class);
    //    $this->call(SubscriptionPackageTableSeeder::class);


        $this->call(UsersTableSeeder::class);
        $this->call(FooterTableSeeder::class);

        $this->call(FooterLinksTableSeeder::class);



        $this->call(StatsTableSeeder::class);
        $this->call(AddonTypeTableSeeder::class);
        $this->call(CurrencyTableSeeder::class);
        $this->call(BusinessCategorySeeder::class);

        $this->call(EmployeeCountTableSeeder::class);
        $this->call(MakerTableSeeder::class);
        $this->call(ShoppingTableSeeder::class);
        $this->call(ProfessionalsTaableSeeder::class);
        $this->call(ClassifiedTaableSeeder::class);
        $this->call(TagSeeder::class);

        $this->call(BusinessTableSeeder::class);
        $this->call(ServiceTableSeeder::class);
        $this->call(AddTableSeeder::class);

        $this->call(ExperienceTableSeeder::class);
        $this->call(DegreeTableSeeder::class);
        $this->call(SkillsTableSeeder::class);
        $this->call(CareerTableSeeder::class);
        $this->call(SalaryTableSeeder::class);
        $this->call(LangaugesTableSeeder::class);
    }
}
