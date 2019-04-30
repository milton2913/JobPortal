<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmploymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employments', function (Blueprint $table) {
            $table->increments('id');
            //Primary Job Information
            $table->integer('employer_id')->unsigned();
            $table->foreign('employer_id')->references('id')->on('employers')->onDelete('cascade');
            $table->string('title',250);
            $table->string('no_of_vacancy')->default('NA');
            $table->integer('employment_category_id')->unsigned();
            $table->foreign('employment_category_id')->references('id')->on('employment_categories')->onDelete('cascade');
            //cal to job_types entity and select multiple job types and store  pivot entity employment_job_type
            $table->date('deadline');
            $table->boolean('resume_receiving_online')->default(1);
            $table->boolean('resume_receiving_email')->default(0);
            $table->string('resume_receiving_email_address',100)->nullable();
            $table->boolean('resume_receiving_hard')->default(0);
            $table->text('resume_receiving_hard_instruction')->nullable();
            $table->boolean('resume_receiving_walk')->default(0);
            $table->text('resume_receiving_walk_text')->nullable();
            $table->text('special_instruction')->nullable();
            $table->boolean('photograph')->default(0);
            //more information
            //cal to job_levels entity and select multiple job sevels and store  pivot entity employment_job_level
            $table->text('context')->nullable();
            $table->longText('responsibility');
            $table->boolean('is_bangladesh')->default(1);
            $table->integer('country_id')->unsigned();
            $table->foreign('country_id')->references('id')->on('countries')->onDelete('cascade');
            //some option are not develop right now as like division,district,state etc

            $table->boolean('salary_is_negotiable')->default(0);
            $table->integer('min_salary')->nullable();
            $table->integer('max_salary')->nullable();
            $table->enum('salary_type',['Hourly','Daily','Weekly','Monthly','Yearly'])->nullable();
            $table->boolean('salary_is_display')->default(0);
            $table->text('extra_salary_info')->nullable();
            $table->boolean('is_compensation')->default(0);
//if compensation is true then select one or multiple compensation
            //cal to compensations entity and select multiple compensation and store  pivot entity compensation_employment
            $table->enum('lunch',['Partially Subsidize','Full Subsidize'])->nullable();
            $table->enum('salary_review',['Half Yearly','Yearly'])->nullable();
            $table->string('festival_bonus')->nullable();
            $table->text('others')->nullable();

//Candidate Requirements
            //education qualification
            //cal to education_levels entity and select multiple education level and store  pivot entity education_level_employment
            //cal to degrees entity and select multiple degree and store  pivot entity degree_employment
            //cal to subject entity and select multiple subject and store  pivot entity employment_subject
            $table->text('edu_qualification_other')->nullable();
            $table->integer('edu_no_of_publication')->default(0);
            $table->text('edu_training_or_course')->nullable();
            $table->text('edu_professional_certification')->nullable();
            //experience
            $table->boolean('is_experience')->default(1);
            $table->integer('exp_min')->nullable();
            $table->integer('exp_max')->nullable();
            $table->boolean('is_exp_fresher')->default(0);
            $table->text('exp_additional_requirement')->nullable();
            //cal to skills entity and select multiple skill and store  pivot entity employment_skill
            //personal information
            $table->enum('gender',['Male','Female','Others']);
            $table->integer('min_age')->nullable();
            $table->integer('max_age')->nullable();
            //company information visibility
            $table->boolean('is_company_name')->default(0);
            $table->boolean('is_company_address')->default(0);
            $table->boolean('is_company_business')->default(0);
            $table->integer('industry_id')->unsigned()->nullable();
            $table->foreign('industry_id')->references('id')->on('industries')->onDelete('set null');
            //Billing Information
            $table->integer('employer_contact_id')->unsigned()->nullable();
            $table->foreign('employer_contact_id')->references('id')->on('employer_contacts')->onDelete('set null');
            //Matching Criteria
            $table->boolean('is_age')->default(1);
            $table->boolean('is_job_level')->default(1);
            $table->boolean('is_total_year_of_experience')->default(1);
            $table->boolean('is_skill')->default(1);
            $table->boolean('is_gender')->default(1);
            $table->boolean('is_location')->default(1);
            $table->boolean('is_salary')->default(1);
            $table->boolean('is_degree')->default(0);
            $table->boolean('is_institute')->default(0);
            $table->boolean('is_subject')->default(0);

             $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employments');
    }
}
