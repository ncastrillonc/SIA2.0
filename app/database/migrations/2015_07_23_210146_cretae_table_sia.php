<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CretaeTableSia extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
            Schema::create('docente', function($table)
            {
                $table->bigInteger('identificacion');
                $table->string('nombre', 30);
                $table->string('apellidos', 30);
                $table->string('usuario', 15);
                $table->string('contrasena', 20);
                $table->string('oficina', 30);
                
                $table->primary('identificacion');                
            });
            
            Schema::create('salon', function($table)
            {
                $table->string('bloque', 5);
                $table->string('aula', 5);
                $table->smallInteger('capacidad');
                
                $table->primary(array('bloque', 'aula'));
            });
            
            Schema::create('carrera', function($table)
            {
                $table->bigInteger('codigo');
                $table->string('nombre', 50);
                $table->smallInteger('credLibre');
                $table->smallInteger('credFnd');
                $table->smallInteger('credDisc');
                
                $table->primary('codigo');
            });
            
            Schema::create('citacion', function($table)
            {
                $table->increments('codigo');
                $table->date('fecha');
                $table->time('horaInicio');
                $table->smallInteger('duracion');
            });
            
            // --
            
            Schema::create('estudiante', function($table)
            {
                $table->bigInteger('identificacion');
                $table->string('nombre', 30);
                $table->string('apellidos', 30);
                $table->string('usuario', 15);
                $table->string('contrasena', 20);
                $table->bigInteger('carrera');
                $table->bigInteger('citacion')->nullable();
                
                $table->primary('identificacion');
                
                $table->foreign('carrera')
                        ->references('codigo')->on('carrera');
                
                $table->foreign('citacion')
                        ->references('codigo')->on('citacion');
            });
            
            Schema::create('curso', function($table)
            {
                $table->bigInteger('codigo');
                $table->string('nombre', 50);
                $table->smallInteger('capacidad');
                $table->string('descripcion', 500);
                $table->string('tipologia', 50);
                $table->smallInteger('creditos');
                $table->string('sBloque', 5);
                $table->string('sAula', 5);
                $table->bigInteger('docente');
                
                $table->primary('codigo');
                
                $table->foreign(array('sBloque', 'sAula'))
                        ->references(array('bloque', 'aula'))->on('salon');
                
                $table->foreign('docente')
                        ->references('identificacion')->on('docente');
            });
            
            // -- --
            
            Schema::create('matricula', function($table)
            {
                $table->bigInteger('curso');
                $table->bigInteger('estudiante');
                $table->string('periodo', 10);
                $table->double('nota', 2, 1);
                
                $table->primary(array('curso', 'estudiante'));
                
                $table->foreign('curso')
                        ->references('codigo')->on('curso');
                
                $table->foreign('estudiante')
                        ->references('identificacion')->on('estudiante');
            });
            
            // **************************************************************
            
            DB::table('docente')
            ->insert([
                'identificacion' => 1001,
                'nombre' => 'Luis',
                'apellidos' => 'Mesa Rojas',
                'usuario' => 'lmesar',
                'contrasena' => Hash::make('123'),
                'oficina' => 'M8A-214'
            ]);
            
            DB::table('docente')
            ->insert([
                'identificacion' => 1002,
                'nombre' => 'Ana',
                'apellidos' => 'Zapata Yepes',
                'usuario' => 'azapatay',
                'contrasena' => Hash::make('987'),
                'oficina' => 'M8A-307'
            ]);
            
            // -- 
            
            DB::table('salon')
            ->insert([
                'bloque' => 'M8',
                'aula' => '202',
                'capacidad' => 50
            ]);
            
            DB::table('salon')
            ->insert([
                'bloque' => 'M8',
                'aula' => '201',
                'capacidad' => 50
            ]);
            
            DB::table('salon')
            ->insert([
                'bloque' => 'M8',
                'aula' => '112',
                'capacidad' => 115
            ]);
            
            // --
            
            DB::table('carrera')
            ->insert([
                'codigo' => 2345,
                'nombre' => 'Ingenieria de Sistemas',
                'credLibre' => 32,
                'credFnd' => 54,
                'credDisc' => 67
            ]);
            
            DB::table('carrera')
            ->insert([
                'codigo' => 2378,
                'nombre' => 'Ingenieria Quimica',
                'credLibre' => 36,
                'credFnd' => 59,
                'credDisc' => 62
            ]);
            
            // --
            
            DB::table('estudiante')
            ->insert([
                'identificacion' => 11281,
                'nombre' => 'Camilo',
                'apellidos' => 'Taborda Zuluaga',
                'usuario' => 'ctabordaz',
                'contrasena' => Hash::make('101'),
                'carrera' => 2345
            ]);
            
            DB::table('estudiante')
            ->insert([
                'identificacion' => 11282,
                'nombre' => 'Jorge Andres',
                'apellidos' => 'Bedoya Hernandez',
                'usuario' => 'jabedoyah',
                'contrasena' => Hash::make('202'),
                'carrera' => 2345
            ]);
            
            // --
            
            DB::table('curso')
            ->insert([
                'codigo' => 10,
                'nombre' => 'Objetos',
                'capacidad' => 30,
                'descripcion' => 'Curso de POO en java',
                'tipologia' => 'Disciplinar',
                'creditos' => 3,
                'sBloque' => 'M8',
                'sAula' => '201',
                'docente' => 1001
            ]);
            
            DB::table('curso')
            ->insert([
                'codigo' => 11,
                'nombre' => 'Software',
                'capacidad' => 35,
                'descripcion' => 'Modelacion y Diagramacion',
                'tipologia' => 'Disciplinar',
                'creditos' => 3,
                'sBloque' => 'M8',
                'sAula' => '202',
                'docente' => 1002
            ]);
            
            DB::table('curso')
            ->insert([
                'codigo' => 12,
                'nombre' => 'Requisitos',
                'capacidad' => 40,
                'descripcion' => 'Educción de requitos y desarrollo de software',
                'tipologia' => 'Disciplinar',
                'creditos' => 3,
                'sBloque' => 'M8',
                'sAula' => '201',
                'docente' => 1002
            ]);
            
            DB::table('curso')
            ->insert([
                'codigo' => 13,
                'nombre' => 'TAE',
                'capacidad' => 45,
                'descripcion' => 'Aprendizaje estadístico',
                'tipologia' => 'Disciplinar',
                'creditos' => 3,
                'sBloque' => 'M8',
                'sAula' => '202',
                'docente' => 1001
            ]);
            
            // --
            
            DB::table('matricula')
            ->insert([
                'curso' => 13,
                'estudiante' => 11282,
                'periodo' => '2014-1',
                'nota' => 3.2
            ]);
            
            DB::table('matricula')
            ->insert([
                'curso' => 11,
                'estudiante' => 11282,
                'periodo' => '2014-1',
                'nota' => 4.1
            ]);
            
            DB::table('matricula')
            ->insert([
                'curso' => 10,
                'estudiante' => 11282,
                'periodo' => '2014-2',
                'nota' => 3.9
            ]);
            
            DB::table('matricula')
            ->insert([
                'curso' => 12,
                'estudiante' => 11282,
                'periodo' => '2014-2',
                'nota' => 3.7
            ]);
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
            Schema::drop('matricula');
            Schema::drop('curso');
            Schema::drop('estudiante');
            Schema::drop('citacion');
            Schema::drop('carrera');
            Schema::drop('salon');
            Schema::drop('docente');            
	}

}
