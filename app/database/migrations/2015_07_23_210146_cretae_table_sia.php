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
                $table->string('descripcion', 500);
                $table->string('tipologia', 50);
                $table->smallInteger('creditos');
                
                $table->primary('codigo');
            });
            
            // --
            
            Schema::create('grupo', function($table)
            {
                $table->bigInteger('codigo');
                $table->bigInteger('curso');
                $table->bigInteger('docente')->nullable();                
                $table->smallInteger('capacidad');
                
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
            
            Schema::create('matricula', function($table)
            {
                $table->bigInteger('grupoCodigo');
                $table->bigInteger('grupoCurso');
                $table->bigInteger('estudiante');
                $table->string('periodo', 10);
                $table->double('nota', 2, 1);                
                                
                $table->primary(array('grupoCodigo', 'grupoCurso', 'estudiante'));
                
                $table->foreign(array('grupoCodigo', 'grupoCurso'))
                        ->references(array('codigo', 'curso'))->on('grupo');
                
                $table->foreign('estudiante')
                        ->references('id')->on('estudiante');
            });   
            
            Schema::create('cupo_grupo', function($table)
            {
                $table->bigInteger('estudiante');
                $table->bigInteger('grupoCodigo');
                $table->bigInteger('grupoCurso');
                
                $table->primary(array('estudiante', 'grupoCodigo', 'grupoCurso'));
                
                $table->foreign('estudiante')
                        ->references('id')->on('estudiante');
                
                $table->foreign(array('grupoCodigo', 'grupoCurso'))
                        ->references(array('codigo', 'curso'))->on('grupo');
            });
            
            Schema::create('requisito', function($table)
            {
                $table->bigInteger('curso');
                $table->bigInteger('requisito');
                $table->string('tipo', 1); // P: Prerrequisito - C: Correquisito
                
                $table->primary(array('curso', 'requisito'));
                
                $table->foreign('curso')
                        ->references('codigo')->on('curso');
                
                $table->foreign('requisito')
                        ->references('codigo')->on('curso');
            });
            
            Schema::create('cupo_curso', function($table)
            {
                $table->bigInteger('estudiante');
                $table->bigInteger('curso');
                
                $table->primary(array('estudiante', 'curso'));
                
                $table->foreign('estudiante')
                        ->references('id')->on('estudiante');
                
                $table->foreign('curso')
                        ->references('codigo')->on('curso');
            });         
                        
            Schema::create('citacion', function($table)
            {
                $table->bigIncrements('id');
                $table->date('fecha');
                $table->time('horaInicio');
                $table->smallInteger('duracion');
                $table->bigInteger('administrador');
                
                $table->foreign('administrador')
                        ->references('id')->on('administrador');
            });
            
            Schema::create('cita_x_estudiante', function($table)
            {
                $table->bigInteger('citacion')->unsigned()->nullable();
                $table->bigInteger('estudiante');
                
                $table->primary(array('citacion', 'estudiante'));
                
                $table->foreign('citacion')
                        ->references('id')->on('citacion');
                
                $table->foreign('estudiante')
                        ->references('id')->on('estudiante');
            });
            
            Schema::create('solicitud', function($table)
            {
                $table->date('fecha');
                $table->bigInteger('docente');
                $table->bigInteger('administrador')->nullable();
                $table->bigInteger('curso');
                
                $table->foreign('docente')
                        ->references('id')->on('docente');
                
                $table->foreign('administrador')
                        ->references('id')->on('administrador');
                
                $table->foreign('curso')
                        ->references('codigo')->on('curso');                
            });
            
            Schema::create('curso_x_carrera', function($table)
            {
                $table->bigInteger('curso');
                $table->bigInteger('carrera');
                
                $table->primary(array('curso', 'carrera'));
                
                $table->foreign('curso')
                        ->references('codigo')->on('curso');
                
                $table->foreign('carrera')
                        ->references('codigo')->on('carrera');
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
            
            DB::table('persona')
            ->insert([
                'id' => 39536,
                'nombre' => 'Nathalie',
                'apellidos' => 'Charari',
                'usuario' => 'natachara',
                'password' => Hash::make('303')
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
            
            DB::table('estudiante')
            ->insert([
                'id' => 39536
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
                'descripcion' => 'Curso de POO en java',
                'tipologia' => 'Disciplinar',
                'creditos' => 3
            ]);
            
            DB::table('curso')
            ->insert([
                'codigo' => 11,
                'nombre' => 'Software',
                'descripcion' => 'Modelacion y Diagramacion',
                'tipologia' => 'Disciplinar',
                'creditos' => 3
            ]);
            
            DB::table('curso')
            ->insert([
                'codigo' => 12,
                'nombre' => 'Requisitos',
                'descripcion' => 'Educción de requitos y desarrollo de software',
                'tipologia' => 'Disciplinar',
                'creditos' => 3
            ]);
            
            DB::table('curso')
            ->insert([
                'codigo' => 13,
                'nombre' => 'TAE',
                'descripcion' => 'Aprendizaje estadístico',
                'tipologia' => 'Disciplinar',
                'creditos' => 3
            ]);
            
            DB::table('curso')
            ->insert([
                'codigo' => 14,
                'nombre' => 'Estructura de Datos',
                'descripcion' => 'Materia en C++',
                'tipologia' => 'Disciplinar',
                'creditos' => 3
            ]);
            
            DB::table('curso')
            ->insert([
                'codigo' => 21,
                'nombre' => 'Cátedra Antioquia',
                'descripcion' => 'Conferencias',
                'tipologia' => 'Libre Elección',
                'creditos' => 3
            ]);
            
            DB::table('curso')
            ->insert([
                'codigo' => 31,
                'nombre' => 'Cálculo I',
                'descripcion' => 'Límites y Derivadas',
                'tipologia' => 'Fundamentación',
                'creditos' => 4
            ]);
            
            // --
            
            DB::table('grupo')
            ->insert([
                'codigo' => 1,
                'curso' => 10,
                'docente' => 1002,
                'capacidad' => 58
            ]);
            
            DB::table('grupo')
            ->insert([
                'codigo' => 1,
                'curso' => 11,
                'docente' => 1002,
                'capacidad' => 58
            ]);
            
            DB::table('grupo')
            ->insert([
                'codigo' => 1,
                'curso' => 12,
                'docente' => 1002,
                'capacidad' => 58
            ]);
            
            DB::table('grupo')
            ->insert([
                'codigo' => 1,
                'curso' => 13,
                'docente' => 1002,
                'capacidad' => 58
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
            
            // --
            
            DB::table('matricula')
            ->insert([
                'grupoCodigo' => 1,
                'grupoCurso' => 13,
                'estudiante' => 11282,
                'periodo' => '2014-1',
                'nota' => 3.2
            ]);
            
            DB::table('matricula')
            ->insert([
                'grupoCodigo' => 1,
                'grupoCurso' => 11,
                'estudiante' => 11282,
                'periodo' => '2014-1',
                'nota' => 4.1
            ]);
            
            DB::table('matricula')
            ->insert([
                'grupoCodigo' => 1,
                'grupoCurso' => 10,
                'estudiante' => 11282,
                'periodo' => '2014-2',
                'nota' => 3.9
            ]);
            
            DB::table('matricula')
            ->insert([
                'grupoCodigo' => 1,
                'grupoCurso' => 12,
                'estudiante' => 11282,
                'periodo' => '2014-2',
                'nota' => 3.7
            ]);
            
            DB::table('matricula')
            ->insert([
                'grupoCodigo' => 1,
                'grupoCurso' => 12,
                'estudiante' => 11281,
                'periodo' => '2015-1',
                'nota' => 3.1
            ]);
            
            // --
            
            DB::table('cupo_grupo')
            ->insert([
                'estudiante' => 39536,
                'grupoCodigo' => 1,
                'grupoCurso' => 12
            ]);
            
            DB::table('cupo_grupo')
            ->insert([
                'estudiante' => 39536,
                'grupoCodigo' => 1,
                'grupoCurso' => 13
            ]);
            
            // --
            
            DB::table('requisito')
            ->insert([
                'curso' => 13,
                'requisito' => 11,
                'tipo' => 'P'
            ]);
            
            DB::table('requisito')
            ->insert([
                'curso' => 10,
                'requisito' => 31,
                'tipo' => 'C'
            ]);
            
            // --
            
            DB::table('cupo_curso')
            ->insert([
                'estudiante' => 39536,
                'curso' => 31
            ]);
            
            // --
            
            // 'horaInicio' => time()
            
            DB::table('citacion')
            ->insert([
                'id' => 1,
                'fecha' => date("Y-m-d"),
                'horaInicio' => "09:45:00",
                'duracion' => 30,
                'administrador' => 666
            ]);        
            
            // --
            
            DB::table('cita_x_estudiante')
            ->insert([
                'citacion' => 1,
                'estudiante' => 11282
            ]);
            
            // --
            
            DB::table('solicitud')
            ->insert([
                'fecha' => date("Y-m-d"),
                'docente' => 1001,
                'administrador' => 666,
                'curso' => 12
            ]);
                        
            // --
            
            DB::table('curso_x_carrera')
            ->insert([
                'curso' => 10,
                'carrera' => 2345
            ]);
            
            DB::table('curso_x_carrera')
            ->insert([
                'curso' => 11,
                'carrera' => 2345
            ]);
            
            DB::table('curso_x_carrera')
            ->insert([
                'curso' => 12,
                'carrera' => 2345
            ]);
            
            DB::table('curso_x_carrera')
            ->insert([
                'curso' => 13,
                'carrera' => 2345
            ]);
            
            DB::table('curso_x_carrera')
            ->insert([
                'curso' => 14,
                'carrera' => 2345
            ]);
            
            DB::table('curso_x_carrera')
            ->insert([
                'curso' => 21,
                'carrera' => 2345
            ]);
            
            DB::table('curso_x_carrera')
            ->insert([
                'curso' => 31,
                'carrera' => 2345
            ]);
            
            DB::table('curso_x_carrera')
            ->insert([
                'curso' => 21,
                'carrera' => 2378
            ]);
            
            DB::table('curso_x_carrera')
            ->insert([
                'curso' => 31,
                'carrera' => 2378
            ]);
            
            // --
            
            DB::table('est_x_carrera')
            ->insert([
                'estudiante' => 11282,
                'carrera' => 2345
            ]);
            
            // --
            
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
            Schema::drop('est_x_carrera');            
            Schema::drop('curso_x_carrera'); 
            Schema::drop('solicitud');
            Schema::drop('cita_x_estudiante'); 
            Schema::drop('citacion'); 
            Schema::drop('cupo_curso'); 
            Schema::drop('requisito'); 
            Schema::drop('cupo_grupo'); 
            Schema::drop('matricula'); 
            Schema::drop('programacion'); 
            Schema::drop('grupo'); 
            Schema::drop('curso');
            Schema::drop('carrera');
            Schema::drop('salon');            
            Schema::drop('estudiante');
            Schema::drop('docente');     
            Schema::drop('administrador'); 
            Schema::drop('persona');           
	}

}
