<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDeliveredSubscriptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('delivered_subscriptions', function (Blueprint $table) {
            $table->id('delivered_subscription_id');
            $table->timestamps();

            $table->bigInteger('user')
                ->constrained('users', 'id')
                ->cascadeOnDelete();

            $table->bigInteger('post')
                ->constrained('posts', 'post_id')
                ->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('delivered_subscriptions');
    }
}
