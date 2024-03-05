<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
class CreateTrigger extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $pass= Hash::make("Dango20507");
        DB::unprepared('
        CREATE  DEFINER=`sapro-dev`@`%`  TRIGGER `barras_before_insert` BEFORE INSERT ON `barras` FOR EACH ROW BEGIN
        IF NEW.barra_codigo IS NULL THEN
	    SET NEW.barra_codigo = UUID();
	    END IF;
        END
        '
        );

        DB::unprepared('
        CREATE DEFINER=`sapro-dev`@`%` TRIGGER `metales_before_insert` BEFORE INSERT ON `metales` FOR EACH ROW BEGIN
        IF NEW.metal_codigo IS NULL THEN
	    SET NEW.metal_codigo = UUID();
	    END IF;
        END
        '
        );

        DB::unprepared('
        CREATE DEFINER=`sapro-dev`@`%` TRIGGER `movimientos_before_insert` BEFORE INSERT ON `movimientos` FOR EACH ROW BEGIN
        IF new.movimiento_codigo IS NULL THEN
        SET new.movimiento_codigo = uuid();
        END IF;
        END'
        );

        DB::unprepared(
            '
        CREATE DEFINER=`root`@`%` TRIGGER `ordenes_before_insert` BEFORE INSERT ON `ordenes` FOR EACH ROW BEGIN
        IF NEW.orden_referencia IS NULL THEN
	    SET NEW.orden_referencia = UUID();
	    END IF;
        END'
        );
        DB::unprepared(
            '
            CREATE DEFINER=`root`@`%` TRIGGER `salidas_before_insert` BEFORE INSERT ON `salidas` FOR EACH ROW BEGIN
            IF NEW.salida_referencia IS NULL THEN
                SET NEW.salida_referencia = UUID();
                END IF;
            END'
        );

        DB::unprepared("

        INSERT INTO `bancos` VALUES (1,'ORO','PLANTA',66.70,0.0000,0.0000,0.0000,'2021-06-09 06:52:37','2021-10-26 13:59:13'),(2,'PLATA','PLANTA',66.70,0,0.0000,0,'2021-06-09 07:00:46','2021-10-26 13:52:05'),(3,'OTROS METALES','PLANTA',100.00,0,0.0000,0,'2021-07-14 00:39:49','2021-10-26 13:52:05'),(4,'ORO','CVM',33.30,0,0.0000,0,'2021-06-09 07:03:22','2021-10-26 13:59:13'),(5,'PLATA','CVM',33.30,0,0.0000,0,'2021-06-09 07:05:37','2021-10-26 13:52:05'),(6,'OTROS METALES','CVM',0.00,0.0000,0.0000,0.0000,'2021-06-09 07:05:39','2021-10-20 17:23:34'),(7,'ORO','BCV',0.00,0.0000,0.0000,0.0000,'2021-06-09 07:07:34','2021-10-26 13:59:13');

        INSERT INTO `barra_estado` VALUES (1,'POR INGRESAR AL PROCESO','Descripcion de estado no disponible','2021-05-21 21:32:10','2021-05-21 21:32:24'),(2,'EN ANALISIS','Descripcion de estado no disponible','2021-05-23 21:39:58','2021-05-23 21:40:00'),(3,'ANALISIS PRELIMINAR COMPLETADO','Descripcion de estado no disponible','2021-05-23 21:40:28','2021-05-23 21:40:29'),(4,'EN ANALISIS COPELACION','Descripcion de estado no disponible','2021-05-26 11:45:05','2021-05-26 11:45:08'),(5,'ANALISIS DE COPELACION COMPLETADO','Descripcion de estado no disponible','2021-05-26 11:45:06','2021-05-26 11:45:10'),(6,'EN PROCESO DE GRANULADO','Descripcion de estado no disponible','2021-05-27 17:43:55','2021-05-27 17:43:56'),(7,'GRANULADO COMPLETADO','Descripcion de estado no disponible','2021-05-27 17:45:38','2021-05-27 17:45:40'),(8,'POR CARGAR EN BLOQUE','Descripcion de estado no disponible','2021-05-27 17:45:37','2021-06-19 13:44:39'),(9,'CARGADA EN BLOQUE','Descripcion de estado no disponible','2021-06-19 13:44:35','2021-06-19 13:44:38'),(10,'REFINADA',NULL,'2021-09-28 17:46:44','2021-09-28 17:46:45'),(11,'EN FUNDICION',NULL,'2021-09-28 17:47:21','2021-09-28 17:47:22'),(12,'REMANENTE',NULL,'2021-09-28 20:43:10','2021-09-28 20:43:10'),(13,'BARRA CONSUMIDA',NULL,'2021-10-02 21:00:28','2021-10-02 21:00:29');

        INSERT INTO `bloque_estado` VALUES (1,'REFINANDO',NULL,'2021-09-25 10:22:13','2021-09-25 10:22:14'),(2,'REFINADO',NULL,'2021-09-25 10:22:48','2021-09-25 10:22:49'),(3,'GRANALLADO',NULL,'2021-09-25 10:22:59','2021-09-25 10:23:00'),(4,'PROCESADO',NULL,'2021-09-25 10:23:16','2021-09-25 10:23:16');

        INSERT INTO `comisiones` VALUES (1,'Comision general',4.50,3.00,1.50,1,1,'2021-09-12 16:21:33','2021-09-12 16:21:34');

        INSERT INTO `departments` VALUES (1,'RECEPCION',1,1,1,NULL,NULL,'2021-07-17 19:52:13','2021-07-17 19:52:13',NULL,NULL),(2,'LABORATORIO',1,1,1,NULL,NULL,'2021-07-17 19:53:04','2021-07-17 19:53:04',NULL,NULL),(3,'FUNDICION Y REFINERIA',1,1,1,NULL,NULL,'2021-07-17 19:55:33','2021-07-17 19:55:33',NULL,NULL),(4,'BOVEDA',1,1,1,NULL,NULL,'2021-07-17 19:56:09','2021-07-17 19:56:09',NULL,NULL),(5,'DESPACHO',1,1,1,NULL,NULL,'2021-07-17 19:56:40','2021-07-17 19:56:40',NULL,NULL);

        INSERT INTO `lingote_estado` VALUES (1,'INICIADO',NULL,'2021-09-25 10:18:30','2021-09-25 10:18:30'),(2,'EN TROQUELADO',NULL,'2021-09-25 10:18:30','2021-09-25 10:18:30'),(3,'TROQUELADO',NULL,'2021-09-25 10:18:30','2021-09-25 10:18:30'),(4,'ENVIADO A BOVEDA',NULL,'2021-09-25 10:18:30','2021-09-25 10:18:30'),(5,'RECIBIDO Y VERIFICADO',NULL,'2021-09-25 10:18:30','2021-09-25 10:18:30'),(6,'LINGOTE EN SALIDA',NULL,'2021-09-25 10:18:30','2021-09-25 10:18:30'),(7,'LINGOTE ENTRAGADO',NULL,'2021-09-25 10:18:30','2021-09-25 10:18:30');

        INSERT INTO `metales` (`id`, `metal_codigo`, `metal_nombre`, `metal_simbolo`, `metal_descripcion`, `activated`, `user_id`, `created_at`, `updated_at`) VALUES
	    (1, '6e4395ce-fc23-44ea-aef2-9585346e4587', 'Oro', 'Au', 'Descripcion del metal no disponible', 1, NULL, '2021-05-23 08:40:44', '2021-10-29 17:37:45'),
	    (2, '46a62196-45a7-4fb2-95e1-5b42ccfbd959', 'Plata', 'Ag', 'Cobre', 1, NULL, '2021-05-16 18:59:43', '2021-10-29 17:37:56'),
	    (3, '874989ad-ed43-4ad5-b364-62e2065480e2', 'Cobre', 'Cu', 'Cobre', 1, NULL, '2021-05-16 19:00:50', '2021-10-29 17:38:04'),
	    (4, '7cbb85f5-0d72-48fa-85b1-0ea315bf3b2e', 'Hierro', 'Fe', 'Cobre', 0, NULL, '2021-05-16 19:00:58', '2021-05-16 19:00:58'),
	    (5, 'aa159d3c-a6e9-405d-9f7a-9467ee0a3cd3', 'Bromo', 'Br', 'Cobre', 0, NULL, '2021-05-16 19:01:14', '2021-05-16 19:01:14'),
	    (11, '55b177cc-55d1-4b23-9b63-4d987dadc7d2', 'Plomo', 'Pb', '****', 0, NULL, '2021-05-29 20:02:07', '2021-05-29 20:02:07'),
	    (12, '4190e86f-2300-4e24-a372-11d6cbe0fd70', 'Calcio', 'Ca', '***', 0, NULL, '2021-06-01 01:23:21', '2021-10-29 16:18:37'),
	    (13, '7c11ad70-61c5-4590-8cb4-71e02e8ac0d9', 'Zinc', 'Zn', 'mineral esencial', 0, NULL, '2021-06-04 13:13:16', '2021-06-04 13:13:16'),
	    (14, '97b29701-fdaf-484b-8d10-30d3da7bc38c', 'Sodio', 'Na', 'mineral', 0, NULL, '2021-06-08 13:55:53', '2021-06-08 13:55:53'),
	    (15, 'fa7b436b-0ba6-11ec-af41-0242ac120009', 'Platino', 'Pt', NULL, 0, NULL, '2021-09-02 00:33:53', '2021-09-02 00:33:53'),
	    (16, '08d3941b-0ba7-11ec-af41-0242ac120009', 'Paladio', 'Pd', NULL, 0, NULL, '2021-09-02 00:34:17', '2021-09-02 00:34:17'),
	    (17, '16772d25-0ba7-11ec-af41-0242ac120009', 'Rodio', 'Rh', NULL, 0, NULL, '2021-09-02 00:34:40', '2021-09-02 00:34:40'),
	    (18, '97fcfeda-3b50-11ec-a412-0242ac120005', 'Aluminio', 'Al', NULL, 0, NULL, '2021-11-01 16:16:27', '2021-11-01 16:16:27'),
	    (19, 'c636d4b1-3b50-11ec-a412-0242ac120005', 'Antimonio', 'Sb', NULL, 0, NULL, '2021-11-01 16:17:45', '2021-11-01 16:17:45'),
	    (20, 'de76907e-3b50-11ec-a412-0242ac120005', 'Arsénico', 'As', NULL, 0, NULL, '2021-11-01 16:18:25', '2021-11-01 16:18:25'),
	    (21, 'ed533268-3b50-11ec-a412-0242ac120005', 'Bismuto', 'Bi', NULL, 0, NULL, '2021-11-01 16:18:50', '2021-11-01 16:18:50'),
	    (22, 'ff1e6f4b-3b50-11ec-a412-0242ac120005', 'Cadmio', 'Cd', NULL, 0, NULL, '2021-11-01 16:19:20', '2021-11-01 16:19:20'),
	    (23, '074a54e7-3b52-11ec-a412-0242ac120005', 'Cerio', 'Ce', NULL, 0, NULL, '2021-11-01 16:26:43', '2021-11-01 16:26:43'),
	    (24, '199cd597-3b52-11ec-a412-0242ac120005', 'Cobalto', 'Co', NULL, 0, NULL, '2021-11-01 16:27:14', '2021-11-01 16:27:14'),
	    (25, '303168aa-3b52-11ec-a412-0242ac120005', 'Cromo', 'Cr', NULL, 0, NULL, '2021-11-01 16:27:52', '2021-11-01 16:27:52'),
	    (26, '44cf4faa-3b52-11ec-a412-0242ac120005', 'Estaño', 'Sn', NULL, 0, NULL, '2021-11-01 16:28:26', '2021-11-01 16:28:26'),
	    (27, '576d4297-3b52-11ec-a412-0242ac120005', 'Magnesio', 'Mg', NULL, 0, NULL, '2021-11-01 16:28:58', '2021-11-01 16:28:58'),
	    (28, '66abf276-3b52-11ec-a412-0242ac120005', 'Manganeso', 'Mn', NULL, 0, NULL, '2021-11-01 16:29:23', '2021-11-01 16:29:23'),
	    (29, '7505bc31-3b52-11ec-a412-0242ac120005', 'Molibdeno', 'Mo', NULL, 0, NULL, '2021-11-01 16:29:47', '2021-11-01 16:29:47'),
	    (30, '861084d4-3b52-11ec-a412-0242ac120005', 'Niquel', 'Ni', NULL, 0, NULL, '2021-11-01 16:30:16', '2021-11-01 16:30:16'),
	    (31, '983e26a0-3b52-11ec-a412-0242ac120005', 'Selenio', 'Se', NULL, 0, NULL, '2021-11-01 16:30:46', '2021-11-01 16:30:46'),
	    (32, 'c3344963-3b52-11ec-a412-0242ac120005', 'Silicio', 'Si', NULL, 0, NULL, '2021-11-01 16:31:58', '2021-11-01 16:31:58'),
	    (33, 'deeb92da-3b52-11ec-a412-0242ac120005', 'Titanio', 'Ti', NULL, 0, NULL, '2021-11-01 16:32:45', '2021-11-01 16:32:45'),
	    (34, 'ee70eb7d-3b52-11ec-a412-0242ac120005', 'Tungsteno', 'W', NULL, 0, NULL, '2021-11-01 16:33:11', '2021-11-01 16:33:11'),
	    (35, '5d3efadd-3b53-11ec-a412-0242ac120005', 'Escandio', 'Sc', NULL, 0, NULL, '2021-11-01 16:36:17', '2021-11-01 16:36:17'),
	    (36, '6bd30fbb-3b53-11ec-a412-0242ac120005', 'Itrio', 'Y', NULL, 0, NULL, '2021-11-01 16:36:41', '2021-11-01 16:36:41'),
	    (37, '7c2d769c-3b53-11ec-a412-0242ac120005', 'Lantano', 'La', NULL, 0, NULL, '2021-11-01 16:37:09', '2021-11-01 16:37:09'),
	    (38, 'b02de859-3b53-11ec-a412-0242ac120005', 'Praseodimio', 'Pr', NULL, 0, NULL, '2021-11-01 16:38:36', '2021-11-01 16:38:36'),
	    (39, 'c3071116-3b53-11ec-a412-0242ac120005', 'Neodimio', 'Nd', NULL, 0, NULL, '2021-11-01 16:39:08', '2021-11-01 16:39:08'),
	    (40, 'd22bd77b-3b53-11ec-a412-0242ac120005', 'Promecio', 'Pm', NULL, 0, NULL, '2021-11-01 16:39:33', '2021-11-01 16:39:33'),
	    (41, 'e13b68cf-3b53-11ec-a412-0242ac120005', 'Samario', 'Sm', NULL, 0, NULL, '2021-11-01 16:39:58', '2021-11-01 16:39:58'),
	    (42, 'efe21aed-3b53-11ec-a412-0242ac120005', 'Europia', 'Eu', NULL, 0, NULL, '2021-11-01 16:40:23', '2021-11-01 16:40:23'),
	    (43, '078e35f9-3b54-11ec-a412-0242ac120005', 'Gadolinio', 'Gd', NULL, 0, NULL, '2021-11-01 16:41:03', '2021-11-01 16:41:03'),
	    (44, '19d889a1-3b54-11ec-a412-0242ac120005', 'Terbio', 'Tb', NULL, 0, NULL, '2021-11-01 16:41:33', '2021-11-01 16:41:33'),
	    (45, '76029e96-3b54-11ec-a412-0242ac120005', 'Disprocio', 'Dy', NULL, 0, NULL, '2021-11-01 16:44:08', '2021-11-01 16:44:08'),
	    (46, '88887b84-3b54-11ec-a412-0242ac120005', 'Holmio', 'Ho', NULL, 0, NULL, '2021-11-01 16:44:39', '2021-11-01 16:44:39'),
	    (47, '94837257-3b54-11ec-a412-0242ac120005', 'Erbio', 'Er', NULL, 0, NULL, '2021-11-01 16:44:59', '2021-11-01 16:44:59'),
	    (48, 'a0e784f3-3b54-11ec-a412-0242ac120005', 'Tulio', 'Tm', NULL, 0, NULL, '2021-11-01 16:45:20', '2021-11-01 16:45:20'),
	    (49, 'b2223c59-3b54-11ec-a412-0242ac120005', 'Iterbio', 'Yb', NULL, 0, NULL, '2021-11-01 16:45:49', '2021-11-01 16:45:49'),
	    (50, 'c07e494c-3b54-11ec-a412-0242ac120005', 'Lutecio', 'Lu', NULL, 0, NULL, '2021-11-01 16:46:13', '2021-11-01 16:46:13'),
	    (51, 'fd762be4-3b55-11ec-a412-0242ac120005', 'Boro', 'B', NULL, 0, NULL, '2021-11-01 16:55:05', '2021-11-01 16:55:05');

        INSERT INTO `orden_estado` VALUES (1,'INICIADA','Estado inicial de las ordenes en recepcion','2021-05-21 21:21:24','2021-05-21 21:21:26'),(2,'PENDIENTE POR ENVIO A LABORATORIO','Estado de la orden que esta por enviarse al laboratorio','2021-05-21 21:23:39','2021-05-21 21:23:42'),(3,'ENVIADO A LABORATORIO',NULL,'2021-05-21 21:27:30','2021-05-21 21:24:22'),(4,'RECIBIDA EN LABORATORIO',NULL,'2021-05-21 21:27:31','2021-05-21 21:24:57'),(5,'APROBADO PARA ANALISIS',NULL,'2021-05-21 21:27:28','2021-05-21 21:29:36'),(6,'ANALISIS PRELIMINAR COMPLETADO',NULL,'2021-05-21 21:27:51','2021-05-21 21:29:37'),(7,'APROBADO PARA ANALISIS DE METALES',NULL,'2021-05-21 21:29:42','2021-05-26 10:33:05'),(8,'ANALISIS DE METALES COMPLETADO',NULL,'2021-05-21 21:29:48','2021-05-26 10:33:06'),(9,'PENDIENTE POR ENVIO A REFINERIA Y FUNDICION',NULL,'2021-05-21 21:29:54','2021-05-26 10:33:07'),(10,'RECIBIDA EN REFINERIA Y FUNDICION',NULL,'2021-05-26 10:33:34','2021-05-26 10:33:34'),(11,'EN GRANALLADO',NULL,'2021-05-27 17:47:19','2021-05-27 17:47:20'),(12,'EN REFINACION',NULL,'2021-06-19 13:45:13','2021-06-19 13:45:14'),(13,'EN FUNDICION',NULL,'2021-09-25 21:56:10','2021-09-25 21:56:11'),(14,'EN TROQUELADO',NULL,'2021-09-26 16:54:45','2021-09-26 16:54:46'),(15,'ENVIADO A BOVEDA',NULL,'2021-09-26 16:54:47','2021-09-26 16:54:47'),(16,'RECIBIDO EN BOVEDA',NULL,'2021-09-26 16:54:48','2021-09-26 16:54:49'),(17,'ORDEN ENTREGADA',NULL,'2021-09-26 16:54:43','2021-09-26 16:54:44');

        INSERT INTO `presentaciones` VALUES (1,'10kg',10000.00,1,1,'2021-08-28 17:07:08','2021-08-28 17:07:08'),(2,'5kg',5000.00,1,1,'2021-08-28 17:07:22','2021-08-28 17:07:22'),(3,'1kg',1000.00,1,1,'2021-08-28 17:07:32','2021-08-28 17:07:32'),(4,'personalizado',0.00,1,1,'2021-09-26 16:53:22','2021-09-26 16:53:23');

        INSERT INTO `salida_estado` VALUES (1,'INICIO DE SALIDA',NULL,'2021-06-28 00:36:42','2021-06-28 00:36:42'),(2,'SALIDA RECIBIDA','Descripcion de estado no disponible','2021-06-29 19:39:02','2021-06-29 19:39:03'),(3,'SALIDA PREPARADA','Descripcion de estado no disponible','2021-07-02 13:12:54','2021-07-02 13:12:55'),(4,'SALIDA APROBADA','Descripcion de estado no disponible','2021-07-02 13:13:34','2021-08-31 00:32:41'),(5,'ENVIADA A DESPACHO','Descripcion de estado no disponible','2021-07-08 06:44:39','2021-07-08 06:44:40'),(6,'SALIDA FINALIZADA','Descripcion de estado no disponible','2021-07-08 06:44:52','2021-07-08 06:44:53');

        INSERT INTO `virutas` VALUES (1,0.5000,1,1,'2021-09-29 11:36:49','2021-09-29 11:36:50');

        INSERT INTO `leyes` VALUES (1, 5.0000, 1, 1, '2021-09-29 11:45:05', '2021-09-29 11:45:05');
        INSERT INTO `settings` VALUES (1,'2021-10-28 01:59:47','2021-10-29 21:28:07',1,20,'Compelejo de Refinacion El Padre de la Patria',NULL,NULL,NULL,NULL,NULL,1,'act',1,NULL,NULL,'fxev90@gmail.com',1,NULL,'QRCODE',NULL,NULL,NULL,'USD',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,'samaccountname','sn','givenname','uid=samaccountname',3,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,'es-VE',30,2.62500,1.00000,0.21975,0.21975,0.50000,0.50000,0.07000,0.05000,9,8.50000,11.00000,0,1,1,'C128',1,30,5,'gmail.com','filastname','filastname',0,NULL,'389',0,5,1,NULL,0,'Y-m-d','h:i A',1,NULL,50,0,NULL,10,NULL,NULL,0,NULL,1,0,0,NULL,'off','Complejo de Refinación El Padre de la Patria','image,category,manufacturer,model_number',0,0,'','blue',1,NULL,0,NULL,'off',0,0,'default',NULL,NULL,NULL,0,1,'',0,0,NULL,NULL,0,0,NULL,NULL,NULL,NULL,'1,234.56',NULL,NULL);
        INSERT INTO `users` VALUES (1,'fxev90@gmail.com','\{$pass}\','{\"superuser\":1}',1,NULL,NULL,NULL,NULL,NULL,'Francisco ','Escalante','2021-10-28 01:59:47','2021-10-28 12:15:47',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'fxev90',NULL,NULL,'8tUkMwaRIstrZZ2LglAVY1PFNdrXJuxkXLEhRoMRwWerANR7tffvxJNa0kfE',0,'es-VE',1,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL);
        ");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared('DROP TRIGGER `barras_before_insert`');
        DB::unprepared('DROP TRIGGER `metales_before_insert`');
        DB::unprepared('DROP TRIGGER `movimientos_before_insert`');
        DB::unprepared('DROP TRIGGER `ordenes_before_insert`');
        DB::unprepared('DROP TRIGGER `salidas_before_insert`');
    }
}
