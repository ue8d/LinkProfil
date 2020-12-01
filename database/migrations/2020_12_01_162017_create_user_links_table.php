
    <?php
        use Illuminate\Support\Facades\Schema;
        use Illuminate\Database\Schema\Blueprint;
        use Illuminate\Database\Migrations\Migration;

        class CreateUserLinksTable extends Migration
        {
            /**
             * Run the migrations.
             *
             * @return void
             */
            public function up()
            {
                Schema::create("user_links", function (Blueprint $table) {

						$table->increments('id');
						$table->bigInteger('user_id')->nullable()->unsigned();
						$table->integer('link_name')->nullable();
						$table->integer('link')->nullable();
                        $table->timestamps();


                    //*********************************
                    // Foreign KEY [ Uncomment if you want to use!! ]
                    //*********************************
                        $table->foreign("user_id")->references("id")->on("users");



						// ----------------------------------------------------
						// -- SELECT [user_links]--
						// ----------------------------------------------------
						// $query = DB::table("user_links")
						// ->leftJoin("users","users.id", "=", "user_links.user_id")
						// ->get();
						// dd($query); //For checking



                });
            }

            /**
             * Reverse the migrations.
             *
             * @return void
             */
            public function down()
            {
                Schema::dropIfExists("user_links");
            }
        }
