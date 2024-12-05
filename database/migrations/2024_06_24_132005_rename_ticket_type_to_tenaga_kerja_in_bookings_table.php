<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RenameTicketTypeToTenagaKerjaInBookingsTable extends Migration
{
    public function up()
    {
        Schema::table('bookings', function (Blueprint $table) {
            $table->renameColumn('ticket_type', 'tenaga_kerja');
        });
    }

    public function down()
    {
        Schema::table('bookings', function (Blueprint $table) {
            $table->renameColumn('tenaga_kerja', 'ticket_type');
        });
    }
}
