<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateReportPaymentMethodView extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        DB::statement($this->createView());
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        DB::statement($this->dropView());
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */

    private function createView(): string
    {
        return <<<SQL
            CREATE VIEW `view_report_payment_method` AS SELECT 
                transactions.receipt_number, 
                transactions.served_by, 
                transactions.collected_by 
                FROM transactions 
            SQL;
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */

    private function dropView(): string
    {
        return <<<SQL
             DROP VIEW IF EXISTS `view_report_payment_method`;
             SQL;
    }
};
