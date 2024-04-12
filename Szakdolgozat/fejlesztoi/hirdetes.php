Schema::create('advertisements', function (Blueprint $table) {
            $table->id('advertisement_id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('city_id');
            $table->unsignedBigInteger('category_id');
            $table->string('title');
            $table->integer('price');
            $table->text('description');
            $table->string('mobile_number')->nullable();
            $table->timestamps();

            $table->foreign('user_id')->references('user_id')->on('users')->onDelete('cascade');
            $table->foreign('city_id')->references('city_id')->on('cities')->onDelete('cascade');
            $table->foreign('category_id')->references('category_id')->on('categories')->onDelete('cascade');
        });
    
