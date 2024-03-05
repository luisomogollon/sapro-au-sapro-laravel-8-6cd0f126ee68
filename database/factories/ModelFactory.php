<?php

/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(Brackets\AdminAuth\Models\AdminUser::class, function (Faker\Generator $faker) {
    return [
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'email' => $faker->email,
        'password' => bcrypt($faker->password),
        'remember_token' => null,
        'activated' => true,
        'forbidden' => $faker->boolean(),
        'language' => 'en',
        'deleted_at' => null,
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
        'last_login_at' => $faker->dateTime,
        
    ];
});/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Colectore::class, static function (Faker\Generator $faker) {
    return [
        'colector_nombres' => $faker->sentence,
        'colector_apellidos' => $faker->sentence,
        'colector_cedula' => $faker->sentence,
        'created_by_admin_user_id' => $faker->sentence,
        'updated_by_admin_user_id' => $faker->sentence,
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
        
        
    ];
});
/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\SalidaEstado::class, static function (Faker\Generator $faker) {
    return [
        'salida_estado_nombre' => $faker->sentence,
        'salida_estado_descripcion' => $faker->text(),
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
        
        
    ];
});
/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Presentacione::class, static function (Faker\Generator $faker) {
    return [
        'presentacion_nombre' => $faker->sentence,
        'presentacion_peso' => $faker->randomNumber(5),
        'created_by_admin_user_id' => $faker->sentence,
        'updated_by_admin_user_id' => $faker->sentence,
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
        
        
    ];
});
/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\LingoteEstado::class, static function (Faker\Generator $faker) {
    return [
        'lingote_estado_nombre' => $faker->sentence,
        'lingote_estado_descripcion' => $faker->sentence,
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
        
        
    ];
});
/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Lingote::class, static function (Faker\Generator $faker) {
    return [
        'lingote_peso' => $faker->randomNumber(5),
        'lingote_troquelado_codigo' => $faker->sentence,
        'salida_id' => $faker->sentence,
        'presentacion_id' => $faker->sentence,
        'lingote_estado_id' => $faker->sentence,
        'updated_by_admin_user_id' => $faker->sentence,
        'user_id' => $faker->sentence,
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
        'lingote_descripcion' => $faker->sentence,
        
        
    ];
});
/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Salida::class, static function (Faker\Generator $faker) {
    return [
        'salida_referencia' => $faker->sentence,
        'activated' => $faker->boolean(),
        'salida_descripcion' => $faker->sentence,
        'colector_id' => $faker->sentence,
        'salida_estado_id' => $faker->sentence,
        'created_by_admin_user_id' => $faker->sentence,
        'updated_by_admin_user_id' => $faker->sentence,
        'user_id' => $faker->sentence,
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
        
        
    ];
});
/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Banco::class, static function (Faker\Generator $faker) {
    return [
        'banco_mineral' => $faker->sentence,
        'banco_cuenta' => $faker->sentence,
        'banco_cantidad_disponible' => $faker->randomNumber(5),
        'banco_cantidad_retiros' => $faker->randomNumber(5),
        'banco_cantidad_depositos' => $faker->randomNumber(5),
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
        
        
    ];
});
/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Ordene::class, static function (Faker\Generator $faker) {
    return [
        'orden_referencia' => $faker->sentence,
        'orden_descripcion' => $faker->text(),
        'cliente_id' => $faker->sentence,
        'orden_estado_id' => $faker->sentence,
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
        'orden_tipo' => $faker->sentence,
        'comision_id' => $faker->sentence,
        
        
    ];
});
/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Movimiento::class, static function (Faker\Generator $faker) {
    return [
        'movimiento_codigo' => $faker->sentence,
        'movimiento_tipo' => $faker->sentence,
        'movimiento_cifra' => $faker->randomNumber(5),
        'banco_id' => $faker->sentence,
        'user_id' => $faker->sentence,
        'barra_id' => $faker->sentence,
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
        
        
    ];
});
/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Barra::class, static function (Faker\Generator $faker) {
    return [
        'barra_codigo' => $faker->sentence,
        'barra_descripcion_operacion' => $faker->text(),
        'barra_estado_id' => $faker->sentence,
        'barra_ley_final' => $faker->randomNumber(5),
        'barra_ley_ingreso' => $faker->randomNumber(5),
        'barra_muestra' => $faker->randomNumber(5),
        'barra_peso_banco' => $faker->randomNumber(5),
        'barra_peso_granalla' => $faker->randomNumber(5),
        'barra_peso_ingreso' => $faker->randomNumber(5),
        'barra_ultimo_peso' => $faker->randomNumber(5),
        'barra_und_masa' => $faker->sentence,
        'created_at' => $faker->dateTime,
        'orden_id' => $faker->sentence,
        'updated_at' => $faker->dateTime,
        'user_id' => $faker->sentence,
        
        
    ];
});
/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Cliente::class, static function (Faker\Generator $faker) {
    return [
        'cliente_correo' => $faker->sentence,
        'cliente_nombre' => $faker->sentence,
        'cliente_rif' => $faker->sentence,
        'cliente_telf' => $faker->sentence,
        'cliente_tipo' => $faker->sentence,
        'comision_id' => $faker->sentence,
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
        'user_id' => $faker->sentence,
        
        
    ];
});
/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Comisione::class, static function (Faker\Generator $faker) {
    return [
        'comision_cvm' => $faker->randomNumber(5),
        'comision_descripcion' => $faker->sentence,
        'comision_monto' => $faker->randomNumber(5),
        'comision_planta' => $faker->randomNumber(5),
        'created_at' => $faker->dateTime,
        'created_by_admin_user_id' => $faker->sentence,
        'updated_at' => $faker->dateTime,
        'updated_by_admin_user_id' => $faker->sentence,
        
        
    ];
});
/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Leye::class, static function (Faker\Generator $faker) {
    return [
        'created_at' => $faker->dateTime,
        'created_by_admin_user_id' => $faker->sentence,
        'ley_margen' => $faker->randomNumber(5),
        'updated_at' => $faker->dateTime,
        'updated_by_admin_user_id' => $faker->sentence,
        
        
    ];
});
/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Viruta::class, static function (Faker\Generator $faker) {
    return [
        'created_at' => $faker->dateTime,
        'created_by_admin_user_id' => $faker->sentence,
        'updated_at' => $faker->dateTime,
        'updated_by_admin_user_id' => $faker->sentence,
        'viruta_muestra' => $faker->randomNumber(5),
        
        
    ];
});
/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Metale::class, static function (Faker\Generator $faker) {
    return [
        'created_at' => $faker->dateTime,
        'metal_codigo' => $faker->sentence,
        'metal_descripcion' => $faker->text(),
        'metal_nombre' => $faker->sentence,
        'metal_simbolo' => $faker->sentence,
        'updated_at' => $faker->dateTime,
        'user_id' => $faker->sentence,
        
        
    ];
});
/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Metale::class, static function (Faker\Generator $faker) {
    return [
        'activated' => $faker->boolean(),
        'created_at' => $faker->dateTime,
        'metal_codigo' => $faker->sentence,
        'metal_descripcion' => $faker->text(),
        'metal_nombre' => $faker->sentence,
        'metal_simbolo' => $faker->sentence,
        'updated_at' => $faker->dateTime,
        'user_id' => $faker->sentence,
        
        
    ];
});
/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Movimiento::class, static function (Faker\Generator $faker) {
    return [
        'activated' => $faker->boolean(),
        'banco_id' => $faker->sentence,
        'barra_id' => $faker->sentence,
        'created_at' => $faker->dateTime,
        'movimiento_cifra' => $faker->randomNumber(5),
        'movimiento_codigo' => $faker->sentence,
        'movimiento_tipo' => $faker->sentence,
        'updated_at' => $faker->dateTime,
        'user_id' => $faker->sentence,
        
        
    ];
});
/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Cliente::class, static function (Faker\Generator $faker) {
    return [
        'cliente_correo' => $faker->sentence,
        'cliente_nombre' => $faker->sentence,
        'cliente_rif' => $faker->sentence,
        'cliente_telf' => $faker->sentence,
        'cliente_tipo' => $faker->sentence,
        'comision_id' => $faker->sentence,
        'created_at' => $faker->dateTime,
        'enabled' => $faker->boolean(),
        'presentacion_id' => $faker->sentence,
        'updated_at' => $faker->dateTime,
        'user_id' => $faker->sentence,
        
        
    ];
});
/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Bloque::class, static function (Faker\Generator $faker) {
    return [
        'bloque_estado_id' => $faker->sentence,
        'bloque_oro_cargado' => $faker->randomNumber(5),
        'bloque_oro_granalla' => $faker->randomNumber(5),
        'bloque_oro_ley' => $faker->randomNumber(5),
        'bloque_oro_ley_real' => $faker->randomNumber(5),
        'bloque_oro_resultado' => $faker->randomNumber(5),
        'bloque_otros_cargado' => $faker->randomNumber(5),
        'bloque_otros_resultado' => $faker->randomNumber(5),
        'bloque_peso' => $faker->randomNumber(5),
        'bloque_plata_cargado' => $faker->randomNumber(5),
        'bloque_plata_resultado' => $faker->randomNumber(5),
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
        'user_id' => $faker->sentence,
        
        
    ];
});
