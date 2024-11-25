<?php

return function (mysqli $conn) {
    $name = 'SOLDADOR PROFESIONAL';
    $description = 'El programa apunta a la inclusión educativa de doctrvenes y adolescentes de entre 16 y 18 años con
Primario completo y que por distintas circunstancias han transitado trayectorias discontinuas en el 
sistema educativo y/o se encuentran cursando ofertas de Formación Profesional, en este caso
formación profesional en Soldador Básico.';
    $image = '/multimedia/img1.jpg';
    $content = 'El programa apunta a la inclusión educativa de jóvenes y adolescentes de entre 16 y 18 años con
Primario completo y que por distintas circunstancias han transitado trayectorias discontinuas en el
sistema educativo y/o se encuentran cursando ofertas de Formación Profesional, en este caso
formación profesional en Soldador Básico.
Esta propuesta articula la enseñanza de las asignaturas básicas de la formación general de nivel
Medio con un trayecto curricular de Formación Profesional inicial correspondiente a un sector de
actividad específico.
Esta propuesta de inclusión y terminalidad educativa se focaliza en el segmento de la población de
jóvenes y adolescentes que tiene entre 16 y 18 años, acreditan el nivel Primario completo y por
circunstancias asociadas a las distintas formas que asume la vulnerabilidad social y educativa han
transitado trayectorias discontinuas e/o inconclusas en el sistema educativo y/o se encuentran
cursando ofertas de Formación Profesional.';

    $sql = "INSERT INTO courses (name, description, image, content) VALUES ('$name', '$description', '$image', '$content')";

    if ($conn->query($sql)) {
        echo " Trayecto insertado correctamente\n";
    } else {
        echo ' Error trayecto: ' . $conn->error . "\n";
    }

    $name = 'CONFECCIONISTA A MEDIDA (MODISTA)';
    $description = 'El Confeccionista a Medida: Modista/o, está capacitado, de acuerdo a las actividades que se
desarrollan en el Perfil Profesional, para interpretar prototipos o diseños para iniciar el trabajo de
confección; trazar y transformar moldes base; cortar prendas de diferentes características; operar
maquinas familiares y/o industriales para realizar el ensamble1, cosido, y acabado de todo tipo de
prendas a medidas con diferentes grados de complejidad; operar en la comercialización del producto
terminado.';
    $image = '/multimedia/img2.jpg';
    $content = 'Alcance del perfil profesional
El Confeccionista a Medida: Modista/o, está capacitado, de acuerdo a las actividades que se
desarrollan en el Perfil Profesional, para interpretar prototipos o diseños para iniciar el trabajo de
confección; trazar y transformar moldes base; cortar prendas de diferentes características; operar
maquinas familiares y/o industriales para realizar el ensamble1, cosido, y acabado de todo tipo de
prendas a medidas con diferentes grados de complejidad; operar en la comercialización del producto
terminado.
Este profesional puede desempeñarse de manera competente en un rango variado de la actividad de
Confección de prendas a medida. Tiene capacidad para operar con autonomía profesional
operaciones de diseño básico, elaboración de moldes base y transformarlos, realizar todo el proceso
de confección de prendas para damas, niños y caballeros, operando diferentes máquinas en forma
autónoma. Está en condiciones de resolver problemas rutinarios simples que se presentan durante la
operación de las máquinas. Sabe determinar en qué situaciones debe recurrir a otros especialistas
para algún asesoramiento o asistencia técnica especifica. Posee responsabilidad sobre su propio
trabajo';

    $sql = "INSERT INTO courses (name, description, image, content) VALUES ('$name', '$description', '$image', '$content')";

    if ($conn->query($sql)) {
        echo " Trayecto insertado correctamente\n";
    } else {
        echo ' Error trayecto: ' . $conn->error . "\n";
    }

    $name = 'TAPICERÍA (TAPICERO DE MUEBLES)';
    $description = 'El/la Tapicero/a de Muebles realiza el patronaje, corte y confección de la cubierta exterior del mueble
(tapizado), fijándola al esqueleto o la estructura a la que previamente habrá incorporado los
elementos de suspensión y de relleno correspondientes, cumpliendo los criterios de calidad
establecidos y la reglamentación vigente sobre prevención, seguridad y salud laboral.';
    $image = '/multimedia/img3.jpg';
    $content = 'El/la Tapicero/a de Muebles realiza el patronaje, corte y confección de la cubierta exterior del mueble
(tapizado), fijándola al esqueleto o la estructura a la que previamente habrá incorporado los
elementos de suspensión y de relleno correspondientes, cumpliendo los criterios de calidad
establecidos y la reglamentación vigente sobre prevención, seguridad y salud laboral.';

    $sql = "INSERT INTO courses (name, description, image, content) VALUES ('$name', '$description', '$image', '$content')";

    if ($conn->query($sql)) {
        echo " Trayecto insertado correctamente\n";
    } else {
        echo ' Error trayecto: ' . $conn->error . "\n";
    }

    $name = 'MOZO/A CAMARERO/A DE SALÓN';
    $description = 'Alcance del perfil profesional El Mozo/Camarero de Salón está capacitado, de acuerdo a las
actividades que se desarrollan en el perfil profesional, para realizar el servicio de alimentos y
bebidas, organizar su plaza de trabajo, acondicionar los recursos materiales, dar la acogida, vender,
asistir y atender el comensal, desde su ingreso hasta su salida del establecimiento';
    $image = '/multimedia/img4.jpg';
    $content = "Alcance del perfil profesional El Mozo/Camarero de Salón está capacitado, de acuerdo a las
actividades que se desarrollan en el perfil profesional, para realizar el servicio de alimentos y
bebidas, organizar su plaza de trabajo, acondicionar los recursos materiales, dar la acogida, vender,
asistir y atender el comensal, desde su ingreso hasta su salida del establecimiento. Busca lograr satisfacer las expectativas del cliente brindado servicios de calidad, atendiendo y gestionando las
quejas y reclamos y respetando los procedimientos del establecimiento Este profesional tendrá
capacidad para actuar como responsable del área de salón o en el marco de un equipo de trabajo en
el proceso de servicio de alimentos y bebidas. Este profesional tendrá capacidad para actuar con
autonomía en el proceso de servicio de alimentos y bebidas. Estará en condiciones de tomar
decisiones en situaciones complejas y no rutinarias que se le presenten en las operaciones de
servicio, aplicando criterios de la calidad y reconociendo los diversos objetivos establecidos por la
\torganización.";

    $sql = "INSERT INTO courses (name, description, image, content) VALUES ('$name', '$description', '$image', '$content')";

    if ($conn->query($sql)) {
        echo " Trayecto insertado correctamente\n";
    } else {
        echo ' Error trayecto: ' . $conn->error . "\n";
    }

    $name = 'REPARACIÓN DE ELECTRODOMÉSTICOS';
    $description = "El alumno/a egresado/a del estará capacitado/a para presupuestar y ejecutar la reparación básica de
distintos electrodomésticos, tales como calefactores, estufas y radiadores eléctricos, secadores de
cabellos, planchas, cortadoras de césped, bordeadoras, ventiladores de pie, lavarropas, secarropas,
centrifugadores y aspiradoras, entre otros, atendiendo a las normas de seguridad eléctrica. Esta
capacitación le permitirá montar su propio taller para la reparación de una gama amplia de marcas y
\tmodelos de electrodomésticos o insertarse en alguna fábrica zonal del rubro.";
    $image = '/multimedia/img5.jpg';
    $content = 'El alumno/a egresado/a del estár capacitado/a para presupuestar y ejecutar la reparación básica de 
distintos electrodomésticos, tales como calefactores, estufas y radiadores eléctricos, secadores de 
cabellos, planchas, cortadoras de césped, bordeadoras, ventiladores de pie, lavarropas, secarropas, centrifugadores y aspiradoras, entre otros, atendiendo a las normas de seguridad eléctrica. Esta
capacitación le permitirá montar su propio taller para la reparación de una gama amplia de marcas y modelos de electrodomésticos o insertarse en alguna fábrica zonal del rubro.';

    $sql = "INSERT INTO courses (name, description, image, content) VALUES ('$name', '$description', '$image', '$content')";

    if ($conn->query($sql)) {
        echo " Trayecto insertado correctamente\n";
    } else {
        echo ' Error trayecto: ' . $conn->error . "\n";
    }

    $name = 'OPERADOR DE INFORMÁTICA PARA LA ADMINISTRACIÓN Y GESTIÓN';
    $description = 'Está capacitado, de acuerdo a las actividades que se desarrollan en el Perfil Profesional, para
utilizar herramientas informáticas de uso corriente en su entorno de trabajo para la resolución de
problemas propios de la actividad que realice dentro de una variedad de actividades generales de
apoyo administrativo, gestional y comunicacional, remitiéndose a especialistas para solucionar
problemas de mayor complejidad.';
    $image = '/multimedia/img6.jpg';
    $content = '
Está capacitado, de acuerdo a las actividades que se desarrollan en el Perfil Profesional, para
utilizar herramientas informáticas de uso corriente en su entorno de trabajo para la resolución de
problemas propios de la actividad que realice dentro de una variedad de actividades generales de
apoyo administrativo, gestional y comunicacional, remitiéndose a especialistas para solucionar
problemas de mayor complejidad.
Está en condiciones de: preparar documentos y presentaciones, confeccionar y mantener
agendas, elaborar planillas con cálculos y graficar sus resultados, mantener bases de datos,
comunicarse a través de los medios de comunicación disponibles en la actualidad, y emplear
eficazmente los servicios provistos sobre plataforma Internet.
Está en condiciones, usando las herramientas habituales de software, para desempeñarse en un
rango moderado de actividades, seleccionando con solvencia los procedimientos apropiados para
la resolución de problemas rutinarios. Sabe determinar en qué situaciones debe recurrir a los
servicios de especialistas de nivel superior. Posee responsabilidad sobre su propio aprendizaje y
trabajo';

    $sql = "INSERT INTO courses (name, description, image, content) VALUES ('$name', '$description', '$image', '$content')";

    if ($conn->query($sql)) {
        echo " Trayecto insertado correctamente\n";
    } else {
        echo ' Error trayecto: ' . $conn->error . "\n";
    }
};
