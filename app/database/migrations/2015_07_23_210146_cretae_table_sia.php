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
            Schema::create('persona', function($table)
            {
                $table->bigInteger('id');
                $table->string('nombre', 30);
                $table->string('apellidos', 30);
                $table->string('usuario', 15);
                $table->string('password', 200);
                $table->timestamps();  
                $table->rememberToken(); 
                
                $table->primary('id');
            });
            
            Schema::create('administrador', function($table)
            {
                $table->bigInteger('id');
                
                $table->primary('id');   
                
                $table->foreign('id')
                        ->references('id')->on('persona');
            });
            
            Schema::create('docente', function($table)
            {
                $table->bigInteger('id');
                $table->string('oficina', 30)->nullable();
                
                $table->primary('id');   
                
                $table->foreign('id')
                        ->references('id')->on('persona');
            });
            
            Schema::create('estudiante', function($table)
            {
                $table->bigInteger('id');
                
                $table->primary('id');
                
                $table->foreign('id')
                        ->references('id')->on('persona');
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
            
            Schema::create('curso', function($table)
            {
                $table->bigInteger('codigo');
                $table->string('nombre', 50);
                $table->smallInteger('capacidad');
                $table->string('descripcion', 500);
                $table->string('tipologia', 50);
                $table->smallInteger('creditos');
                
                $table->primary('codigo');
            });
            
            // --
            
            Schema::create('citacion', function($table)
            {
                $table->bigIncrements('codigo');
                $table->date('fecha');
                $table->time('horaInicio');
                $table->smallInteger('duracion');
                $table->bigInteger('administrador');
                
                $table->foreign('administrador')
                        ->references('id')->on('administrador');
            });
            
            Schema::create('solicitud', function($table)
            {
                $table->bigIncrements('codigo');
                $table->date('fecha');
                $table->string('descripcion', 500);
                $table->boolean('estado')->default(0);
                $table->bigInteger('docente');
                $table->bigInteger('administrador');
                $table->bigInteger('curso');
                
                $table->foreign('docente')
                        ->references('id')->on('docente');
                
                $table->foreign('administrador')
                        ->references('id')->on('administrador');
                
                $table->foreign('curso')
                        ->references('codigo')->on('curso');                
            });
            
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
                        ->references('id')->on('estudiante');
            });           
            
            Schema::create('est_x_carrera', function($table)
            {
                $table->bigInteger('estudiante');
                $table->bigInteger('carrera');                
                
                $table->primary(array('estudiante', 'carrera'));
                
                $table->foreign('estudiante')
                        ->references('id')->on('estudiante');
                
                $table->foreign('carrera')
                        ->references('codigo')->on('carrera');
            });
            
            Schema::create('cita_x_estudiante', function($table)
            {
                $table->bigInteger('citacion')->unsigned()->nullable();
                $table->bigInteger('estudiante');
                
                $table->primary(array('citacion', 'estudiante'));
                
                $table->foreign('citacion')
                        ->references('codigo')->on('citacion');
                
                $table->foreign('estudiante')
                        ->references('id')->on('estudiante');
            });
            
            Schema::create('grupo', function($table)
            {
                $table->bigInteger('codigo');
                $table->bigInteger('curso');
                $table->bigInteger('docente')->nullable();
                
                $table->primary(array('codigo', 'curso'));
                
                $table->foreign('curso')
                        ->references('codigo')->on('curso');
                
                $table->foreign('docente')
                        ->references('id')->on('docente');
            });
            
            Schema::create('programacion', function($table)
            {
                $table->bigInteger('codigo');
                $table->string('dia', 20);
                $table->time('horaInicio');
                $table->smallInteger('duracion');
                
                $table->bigInteger('grupo_codigo');
                $table->bigInteger('grupo_curso');
                
                $table->string('salon_bloque', 5);
                $table->string('salon_aula', 5);
                
                $table->primary(array('codigo', 'grupo_codigo', 'grupo_curso'));
                
                $table->foreign(array('grupo_codigo', 'grupo_curso'))->references(array('codigo', 'curso'))->on('grupo');
                $table->foreign(array('salon_bloque', 'salon_aula'))->references(array('bloque', 'aula'))->on('salon');
            });
            
            // **************************************************************
            
            DB::table('persona')
            ->insert([
                'id' => 666,
                'nombre' => 'Esteban',
                'apellidos' => 'Quito',
                'usuario' => 'esquito',
                'password' => Hash::make('666')
            ]);
            
            DB::table('persona')
            ->insert([
                'id' => 1001,
                'nombre' => 'Luis',
                'apellidos' => 'Mesa Rojas',
                'usuario' => 'lmesar',
                'password' => Hash::make('123')
            ]);
            
            DB::table('persona')
            ->insert([
                'id' => 1002,
                'nombre' => 'Ana',
                'apellidos' => 'Zapata Yepes',
                'usuario' => 'azapatay',
                'password' => Hash::make('987')
            ]);
            
            DB::table('persona')
            ->insert([
                'id' => 11281,
                'nombre' => 'Camilo',
                'apellidos' => 'Taborda Zuluaga',
                'usuario' => 'ctabordaz',
                'password' => Hash::make('101')
            ]);
            
            DB::table('persona')
            ->insert([
                'id' => 11282,
                'nombre' => 'Jorge Andres',
                'apellidos' => 'Bedoya Hernandez',
                'usuario' => 'jabedoyah',
                'password' => Hash::make('202')
            ]);
            
            // -- 
            
            DB::table('administrador')
            ->insert([
                'id' => 666
            ]);
            
            // -- 
            
            DB::table('docente')
            ->insert([
                'id' => 1001,
                'oficina' => 'M8A-214'
            ]);
            
            DB::table('docente')
            ->insert([
                'id' => 1002,
                'oficina' => 'M8A-307'
            ]);
            
            // --
            
            DB::table('estudiante')
            ->insert([
                'id' => 11281
            ]);
            
            DB::table('estudiante')
            ->insert([
                'id' => 11282
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
            
            DB::table('curso')
            ->insert([
                'codigo' => 10,
                'nombre' => 'Objetos',
                'capacidad' => 30,
                'descripcion' => 'Curso de POO en java',
                'tipologia' => 'Disciplinar',
                'creditos' => 3
            ]);
            
            DB::table('curso')
            ->insert([
                'codigo' => 11,
                'nombre' => 'Software',
                'capacidad' => 35,
                'descripcion' => 'Modelacion y Diagramacion',
                'tipologia' => 'Disciplinar',
                'creditos' => 3
            ]);
            
            DB::table('curso')
            ->insert([
                'codigo' => 12,
                'nombre' => 'Requisitos',
                'capacidad' => 40,
                'descripcion' => 'Educción de requitos y desarrollo de software',
                'tipologia' => 'Disciplinar',
                'creditos' => 3
            ]);
            
            DB::table('curso')
            ->insert([
                'codigo' => 13,
                'nombre' => 'TAE',
                'capacidad' => 45,
                'descripcion' => 'Aprendizaje estadístico',
                'tipologia' => 'Disciplinar',
                'creditos' => 3
            ]);
            
            // --
            
            DB::table('citacion')
            ->insert([
                'codigo' => 1,
                'fecha' => date("Y-m-d"),
                'horaInicio' => time(),
                'duracion' => 30,
                'administrador' => 666
            ]);            
            
            
            // --
            
            DB::table('solicitud')
            ->insert([
                'fecha' => date("Y-m-d"),
                'descripcion' => 'Prueba de solicitud',
                'estado' => 1,
                'docente' => 1001,
                'administrador' => 666,
                'curso' => 12
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
            
            // --
            
            DB::table('est_x_carrera')
            ->insert([
                'estudiante' => 11282,
                'carrera' => 2345
            ]);
            
            // --
            
            DB::table('cita_x_estudiante')
            ->insert([
                'citacion' => 1,
                'estudiante' => 11282
            ]);
            
            // --
            
            DB::table('grupo')
            ->insert([
                'codigo' => 1,
                'curso' => 11,
                'docente' => 1002
            ]);
            
            // --
            
            DB::table('programacion')
            ->insert([
                'codigo' => 1,
                'dia' => 'Lunes',
                'horaInicio' => time(),
                'duracion' => 2,
                'grupo_codigo' => 1,
                'grupo_curso' => 11,
                'salon_bloque' => 'M8',
                'salon_aula' => '202'
                
            ]);
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
            Schema::drop('programacion'); 
            Schema::drop('grupo'); 
            Schema::drop('cita_x_estudiante'); 
            Schema::drop('est_x_carrera');            
            Schema::drop('matricula');            
            Schema::drop('solicitud');
            Schema::drop('citacion');            
            Schema::drop('curso');
            Schema::drop('carrera');
            Schema::drop('salon');            
            Schema::drop('estudiante');
            Schema::drop('docente');     
            Schema::drop('administrador'); 
            Schema::drop('persona');           
	}

}
