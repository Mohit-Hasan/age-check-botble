<?php

namespace Botble\AgeCheck\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Routing\Router;
use Botble\AgeCheck\Http\Middleware\AgeCheckMiddleware;
use Botble\Theme\Facades\Theme;


class AgeCheckServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->loadRoutesFrom(__DIR__ . '/../../routes/web.php');

        $this->loadViewsFrom(__DIR__ . '/../../resources/views', 'age-check');

        $router = $this->app['router'];
        $router->pushMiddlewareToGroup('web', AgeCheckMiddleware::class);

        add_filter(THEME_FRONT_FOOTER, function ($html) {
            if (!is_in_admin() && session('is_18_or_over') !== true) {
                //logger('age popup working...'); // for debug only
                return $html . view('age-check::popup')->render();
            }

            return $html;
        }, 9999);

        $this->app['events']->listen(\Botble\Theme\Events\RenderingThemeOptionSettings::class, function () {
            theme_option()
                ->setSection([
                    'title'      => 'Age Check',
                    'id'         => 'opt-text-subsection-age-check',
                    'subsection' => true,
                    'icon'       => 'ti ti-shield-check',
                    'priority'   => 9999,
                    'fields'     => [
                        [
                            'id'         => 'age_check_enable',
                            'type'       => 'customSelect',
                            'label'      => 'Enable Age Check',
                            'attributes' => [
                                'name' => 'age_check_enable',
                                'list' => [
                                    'yes' => 'Yes',
                                    'no'  => 'No',
                                ],
                                'value' => 'yes',
                                'options' => [
                                    'class' => 'form-control',
                                ],
                            ],
                        ],
                        
                        [
                            'id'         => 'age_check_msg',
                            'type'       => 'text',
                            'label'      => 'Age Check Message',
                            'attributes' => [
                                'name' => 'age_check_msg',
                                'value' => 'Are you 18 years old or over?',
                                'options' => [
                                    'class' => 'form-control',
                                ],
                            ],
                        ],


                        [
                            'id'         => 'age_check_button_yes_text',
                            'type'       => 'text',
                            'label'      => 'Confirm Button Text',
                            'attributes' => [
                                'name' => 'age_check_button_yes_text',
                                'value' => 'Yes, I am 18+',
                                'options' => [
                                    'class' => 'form-control',
                                ],
                            ],
                        ],
                        [
                            'id'         => 'age_check_button_no_text',
                            'type'       => 'text',
                            'label'      => 'Deny Button Text',
                            'attributes' => [
                                'name' => 'age_check_button_no_text',
                                'value' => 'No',
                                'options' => [
                                    'class' => 'form-control',
                                ],
                            ],
                        ],

                        [
                            'id' => 'age_check_denied_title',
                            'type' => 'text',
                            'label' => 'Denied Page Title',
                            'attributes' => [
                                'name' => 'age_check_denied_title',
                                'value' => 'Access Denied',
                                'options' => [
                                    'class' => 'form-control',
                                ],
                            ],
                        ],
                        [
                            'id' => 'age_check_denied_message',
                            'type' => 'textarea',
                            'label' => 'Denied Page Message',
                            'attributes' => [
                                'name' => 'age_check_denied_message',
                                'value' => 'Sorry, this website is only for visitors over 18 years old.',
                                'options' => [
                                    'class' => 'form-control',
                                    'rows' => 3,
                                ],
                            ],
                        ],

                        [
                            'id'         => 'age_check_background_color',
                            'type'       => 'customColor',
                            'label'      => 'Popup Background Color',
                            'attributes' => [
                                'name' => 'age_check_background_color',
                                'value' => '#ffffff',
                                'options' => [
                                    'class' => 'form-control',
                                ],
                            ],
                        ],
                        [
                            'id'         => 'age_check_text_color',
                            'type'       => 'customColor',
                            'label'      => 'Popup Text Color',
                            'attributes' => [
                                'name' => 'age_check_text_color',
                                'value' => '#333333',
                                'options' => [
                                    'class' => 'form-control',
                                ],
                            ],
                        ],
                        [
                            'id'         => 'age_check_overlay_color',
                            'type'       => 'customColor',
                            'label'      => 'Overlay Background Color',
                            'attributes' => [
                                'name' => 'age_check_overlay_color',
                                'value' => 'rgba(0,0,0,0.6)',
                                'options' => [
                                    'class' => 'form-control',
                                ],
                            ],
                        ],
                    ],
                ]);
        });
    }

    public function register()
    {
        // TODO: anything in future
    }
}
