<?php

use Illuminate\Database\Seeder;

class DefaultContent extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Users
        DB::table('users')->insert([
                [
                    'id' => 1,
                    'name' => 'Super admin',
                    'email' => 'superadmin@list.ru',
                    'password' => bcrypt(111111),
                    'enabled' => 1,
                ],
                [
                    'id' => 2,
                    'name' => 'Just admin',
                    'email' => 'admin@list.ru',
                    'password' => bcrypt(111111),
                    'enabled' => 1,
                ]
            ]
        );

        //Roles
        DB::table('roles')->insert([
                [
                    'id' => 1,
                    'name' => 'super-admin',
                    'display_name' => 'Super administrator',
                    'description' => 'User is allowed to manage and edit all modules',
                ],
                [
                    'id' => 2,
                    'name' => 'admin',
                    'display_name' => 'Administrator',
                    'description' => 'User is allowed to manage and edit',
                ]
            ]
        );
        //Users roles
        DB::table('role_user')->insert([
                [
                    'user_id' => 1,
                    'role_id' => 1
                ],
                [
                    'user_id' => 2,
                    'role_id' => 2
                ]
            ]
        );

        //Permissions
        DB::table('permissions')->insert([
                ///Users
                [
                    'name' => 'create-user',
                    'display_name' => 'Создавать',
                    'description' => 'Права на создание пользователя',
                ],
                [
                    'name' => 'delete-user',
                    'display_name' => 'Удалять',
                    'description' => 'Права на удаление пользователя',
                ],
                [
                    'name' => 'edit-user',
                    'display_name' => 'Изменять',
                    'description' => 'Права на изменения пользователя',
                ],
                [
                    'name' => 'view-user',
                    'display_name' => 'Просмотр',
                    'description' => 'Права на просмотр пользователя',
                ],
                ///Contents
                [
                    'name' => 'create-content',
                    'display_name' => 'Создавать',
                    'description' => 'Права на создание контента',
                ],
                [
                    'name' => 'delete-content',
                    'display_name' => 'Удалять',
                    'description' => 'Права на удаление контента',
                ],
                [
                    'name' => 'edit-content',
                    'display_name' => 'Изменять',
                    'description' => 'Права на изменения контента',
                ],
                [
                    'name' => 'view-content',
                    'display_name' => 'Просмотр',
                    'description' => 'Права на просмотр контента',
                ],
                ///News
                [
                    'name' => 'create-news',
                    'display_name' => 'Создавать',
                    'description' => 'Права на создание новостей',
                ],
                [
                    'name' => 'delete-news',
                    'display_name' => 'Удалять',
                    'description' => 'Права на удаление новостей',
                ],
                [
                    'name' => 'edit-news',
                    'display_name' => 'Изменять',
                    'description' => 'Права на изменения новостей',
                ],
                [
                    'name' => 'view-news',
                    'display_name' => 'Просмотр',
                    'description' => 'Права на просмотр новостей',
                ],
                ///Product
                [
                    'name' => 'create-product',
                    'display_name' => 'Создавать',
                    'description' => 'Права на создание товаров',
                ],
                [
                    'name' => 'delete-product',
                    'display_name' => 'Удалять',
                    'description' => 'Права на удаление товаров',
                ],
                [
                    'name' => 'edit-product',
                    'display_name' => 'Изменять',
                    'description' => 'Права на изменения товаров',
                ],
                [
                    'name' => 'view-product',
                    'display_name' => 'Просмотр',
                    'description' => 'Права на просмотр товаров',
                ],
                ///Categories
                [
                    'name' => 'create-category',
                    'display_name' => 'Создавать',
                    'description' => 'Права на создание категорий',
                ],
                [
                    'name' => 'delete-category',
                    'display_name' => 'Удалять',
                    'description' => 'Права на удаление категорий',
                ],
                [
                    'name' => 'edit-category',
                    'display_name' => 'Изменять',
                    'description' => 'Права на изменения категорий',
                ],
                [
                    'name' => 'view-category',
                    'display_name' => 'Просмотр',
                    'description' => 'Права на просмотр категорий',
                ],
                ///Orders
                [
                    'name' => 'create-order',
                    'display_name' => 'Создавать',
                    'description' => 'Права на создание заказов',
                ],
                [
                    'name' => 'delete-order',
                    'display_name' => 'Удалять',
                    'description' => 'Права на удаление заказов',
                ],
                [
                    'name' => 'edit-order',
                    'display_name' => 'Изменять',
                    'description' => 'Права на изменения заказов',
                ],
                [
                    'name' => 'view-order',
                    'display_name' => 'Просмотр',
                    'description' => 'Права на просмотр заказов',
                ],
                ///Settings
                [
                    'name' => 'create-setting',
                    'display_name' => 'Создавать',
                    'description' => 'Права на создание настроек',
                ],
                [
                    'name' => 'delete-setting',
                    'display_name' => 'Удалять',
                    'description' => 'Права на удаление настроек',
                ],
                [
                    'name' => 'edit-setting',
                    'display_name' => 'Изменять',
                    'description' => 'Права на изменения настроек',
                ],
                [
                    'name' => 'view-setting',
                    'display_name' => 'Просмотр',
                    'description' => 'Права на просмотр настроек',
                ],
                ///Filters
                [
                    'name' => 'create-filter',
                    'display_name' => 'Создавать',
                    'description' => 'Права на создание фильтров',
                ],
                [
                    'name' => 'delete-filter',
                    'display_name' => 'Удалять',
                    'description' => 'Права на удаление фильтров',
                ],
                [
                    'name' => 'edit-filter',
                    'display_name' => 'Изменять',
                    'description' => 'Права на изменения фильтров',
                ],
                [
                    'name' => 'view-filter',
                    'display_name' => 'Просмотр',
                    'description' => 'Права на просмотр фильтров',
                ],
                ///Delivery
                [
                    'name' => 'create-delivery',
                    'display_name' => 'Создавать',
                    'description' => 'Права на создание доставки',
                ],
                [
                    'name' => 'delete-delivery',
                    'display_name' => 'Удалять',
                    'description' => 'Права на удаление доставки',
                ],
                [
                    'name' => 'edit-delivery',
                    'display_name' => 'Изменять',
                    'description' => 'Права на изменения доставки',
                ],
                [
                    'name' => 'view-delivery',
                    'display_name' => 'Просмотр',
                    'description' => 'Права на просмотр доставки',
                ],
                ///Payments
                [
                    'name' => 'create-payment',
                    'display_name' => 'Создавать',
                    'description' => 'Права на создание оплат',
                ],
                [
                    'name' => 'delete-payment',
                    'display_name' => 'Удалять',
                    'description' => 'Права на удаление оплат',
                ],
                [
                    'name' => 'edit-payment',
                    'display_name' => 'Изменять',
                    'description' => 'Права на изменения оплат',
                ],
                [
                    'name' => 'view-payment',
                    'display_name' => 'Просмотр',
                    'description' => 'Права на просмотр оплат',
                ],
                ///Comments
                [
                    'name' => 'create-comment',
                    'display_name' => 'Создавать',
                    'description' => 'Права на создание комментариев',
                ],
                [
                    'name' => 'delete-comment',
                    'display_name' => 'Удалять',
                    'description' => 'Права на удаление комментариев',
                ],
                [
                    'name' => 'edit-comment',
                    'display_name' => 'Изменять',
                    'description' => 'Права на изменения комментариев',
                ],
                [
                    'name' => 'view-comment',
                    'display_name' => 'Просмотр',
                    'description' => 'Права на просмотр комментариев',
                ],
                ///Prices
                [
                    'name' => 'create-price',
                    'display_name' => 'Создавать',
                    'description' => 'Права на создание цен',
                ],
                [
                    'name' => 'delete-price',
                    'display_name' => 'Удалять',
                    'description' => 'Права на удаление цен',
                ],
                [
                    'name' => 'edit-price',
                    'display_name' => 'Изменять',
                    'description' => 'Права на изменения цен',
                ],
                [
                    'name' => 'view-price',
                    'display_name' => 'Просмотр',
                    'description' => 'Права на просмотр цен',
                ],
                ///Currency
                [
                    'name' => 'create-currency',
                    'display_name' => 'Создавать',
                    'description' => 'Права на создание валют',
                ],
                [
                    'name' => 'delete-currency',
                    'display_name' => 'Удалять',
                    'description' => 'Права на удаление валют',
                ],
                [
                    'name' => 'edit-currency',
                    'display_name' => 'Изменять',
                    'description' => 'Права на изменения валют',
                ],
                [
                    'name' => 'view-currency',
                    'display_name' => 'Просмотр',
                    'description' => 'Права на просмотр валют',
                ],
                ///Seo
                [
                    'name' => 'create-seo',
                    'display_name' => 'Создавать',
                    'description' => 'Права на создание сео-данных',
                ],
                [
                    'name' => 'delete-seo',
                    'display_name' => 'Удалять',
                    'description' => 'Права на удаление сео-данных',
                ],
                [
                    'name' => 'edit-seo',
                    'display_name' => 'Изменять',
                    'description' => 'Права на изменения сео-данных',
                ],
                [
                    'name' => 'view-seo',
                    'display_name' => 'Просмотр',
                    'description' => 'Права на просмотр сео-данных',
                ],

            ]
        );
    }
}
