<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Form;

class FormServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        Form::component('bsText', 'components.form.text', ['name', 'value' => null, 'attributes' => [], 'title']);
        Form::component('bsNumber', 'components.form.number', ['name', 'value' => null, 'attributes' => [], 'title']);
        Form::component('bsTextArea', 'components.form.textarea', ['name', 'value' => null, 'attributes' => [], 'title']);
        Form::component('bsSubmit', 'components.form.submit', ['value' => 'Submit', 'attributes' => [], 'title']);
        Form::component('hidden', 'components.form.hidden', ['name', 'value' => null, 'attributes' => [], 'title']);
        Form::component('bsSelect', 'components.form.select', ['name', 'options', 'value' => null, 'attributes' => [], 'title']);
        Form::component('bsState', 'components.form.state', ['name', 'value' => null, 'attributes' => [], 'title']);
        Form::component('bsDate', 'components.form.date', ['name', 'value' => null, 'attributes' => [], 'title']);
        Form::component('bsRadio', 'components.form.radio', ['name', 'options', 'value' => null, 'attributes' => [], 'title']);
        Form::component('bsCheckbox', 'components.form.checkbox', ['name', 'value' => null, 'attributes' => [], 'title']);
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
