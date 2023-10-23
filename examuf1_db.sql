-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 20-10-2022 a las 19:29:51
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `examuf1_db`
--
CREATE DATABASE IF NOT EXISTS `examuf1_db` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `examuf1_db`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `posts`
--

DROP TABLE IF EXISTS `posts`;
CREATE TABLE IF NOT EXISTS `posts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `synopsis` text NOT NULL,
  `title` text NOT NULL,
  `director` text NOT NULL,
  `link` text NOT NULL,
  `youtube_link` text NOT NULL,
  `user_id` int(11) NOT NULL,
  `dateTime` timestamp NOT NULL DEFAULT current_timestamp(),
  `image_path` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=68 DEFAULT CHARSET=utf8mb4;

--
-- Truncar tablas antes de insertar `posts`
--

TRUNCATE TABLE `posts`;
--
-- Volcado de datos para la tabla `posts`
--

INSERT INTO `posts` (`id`, `synopsis`, `title`, `director`, `link`, `youtube_link`, `user_id`, `dateTime`, `image_path`) VALUES
(1, 'En Londres, a finales del siglo XIX, cuando los magos eran los ídolos más aclamados, dos jóvenes ilusionistas se proponen alcanzar la fama. El sofisticado Robert Angier (Hugh Jackman) es un consumado artista, mientras que el tosco y purista Alfred Borden (Christian Bale) es un genio creativo, pero carece de la habilidad necesaria para ejecutar en público sus mágicas ideas. Al principio son compañeros y amigos que se admiran mutuamente. Sin embargo, cuando el mejor truco ideado por ambos fracasa, se convierten en enemigos irreconciliables: cada uno de ellos intentará por todos los medios superar al otro y acabar con él. Truco a truco, espectáculo a espectáculo, se va fraguando una feroz competición que no tiene límites.', 'The Prestige', 'Christopher Nolan', 'https://www.filmaffinity.com/es/film343841.html', 'https://www.youtube.com/watch?v=ELq7V8vkekI', 1, '2022-10-11 19:40:05', '1.jpg'),
(2, 'Al ver que la vida en la Tierra está llegando a su fin, un grupo de exploradores dirigidos por el piloto Cooper (McConaughey) y la científica Amelia (Hathaway) emprende una misión que puede ser la más importante de la historia de la humanidad: viajar más allá de nuestra galaxia para descubrir algún planeta en otra que pueda garantizar el futuro de la raza humana.', 'Interstellar', 'Christopher Nolan', 'https://www.filmaffinity.com/es/film704416.html', 'https://www.youtube.com/watch?v=zSWdZVtXT7E', 1, '2022-10-11 19:40:05', '2.jpg'),
(3, 'Evan Treborn, un joven que se está esforzando por superar unos dolorosos recuerdos de su infancia, descubre una técnica que le permite viajar atrás en el tiempo y ocupar su cuerpo de niño para poder cambiar el curso de su dolorosa historia. Sin embargo también descubre que cualquier mínimo cambio en el pasado altera enormemente su futuro.', 'The Butterfly Effect', 'Eric Bress, J. Mackye Gruber', 'https://www.filmaffinity.com/es/film235464.html', 'https://youtu.be/YMwhS9jSH9w', 1, '2022-10-11 19:40:05', '3.jpg'),
(4, 'Un joven hastiado de su gris y monótona vida lucha contra el insomnio. En un viaje en avión conoce a un carismático vendedor de jabón que sostiene una teoría muy particular: el perfeccionismo es cosa de gentes débiles; sólo la autodestrucción hace que la vida merezca la pena. Ambos deciden entonces fundar un club secreto de lucha, donde poder descargar sus frustaciones y su ira, que tendrá un éxito arrollador.', 'Fight Club', 'David Fincher', 'https://www.filmaffinity.com/es/film536945.html', 'https://www.youtube.com/watch?v=qtRKdVHc-cE', 1, '2022-10-11 19:40:05', '4.jpg'),
(5, 'Kate Dibiasky (Jennifer Lawrence), estudiante de posgrado de Astronomía, y su profesor, el doctor Randall Mindy (Leonardo DiCaprio) hacen un descubrimiento tan asombros como terrorífico: un enorme cometa lleva un rumbo de colisión directa con la Tierra. El otro problema es... que a nadie le importa. Kate y Randall emprenden una gira mediática advertir a la humanidad que los lleva desde la indiferente presidenta Orlean (Meryl Streep) y su hijo y jefe de gabinete, Jason (Jonah Hill), a la emisión de \'The Daily Rip\', un animado programa matinal presentado por Brie (Cate Blanchett) y Jack (Tyler Perry). Solo quedan seis meses para el impacto del cometa, pero gestionar el flujo de noticias y ganarse la atención de un público obsesionado con las redes sociales antes de que sea demasiado tarde resulta sorprendentemente cómico. ¿Pero qué es lo que hay que hacer para que el mundo mire hacia arriba?', 'Don\'t Look Up', 'Adam McKay', 'https://www.filmaffinity.com/es/film521393.html', 'https://www.youtube.com/watch?v=RbIxYm3mKzI', 1, '2022-10-11 19:40:05', '5.jpg'),
(6, 'En el verano de 1954, los agentes judiciales Teddy Daniels (DiCaprio) y Chuck Aule (Ruffalo) son destinados a una remota isla del puerto de Boston para investigar la desaparición de una peligrosa asesina (Mortimer) que estaba recluida en el hospital psiquiátrico Ashecliffe, un centro penitenciario para criminales perturbados dirigido por el siniestro doctor John Cawley (Kingsley). Pronto descubrirán que el centro guarda muchos secretos y que la isla esconde algo más peligroso que los pacientes. Thriller psicológico basado en la novela homónima de Dennis Lehane (autor de &quot;Mystic River&quot; y &quot;Gone Baby Gone&quot;).', 'Shutter Island', 'Martin Scorsese', 'https://www.filmaffinity.com/es/film173696.html', 'https://www.youtube.com/watch?v=v8yrZSkKxTA', 1, '2022-10-11 19:40:05', '6.jpg'),
(7, 'El 21 de octubre de 1994, Heather Donahue, Joshua Leonard y Michael Williams entraron en un bosque de Maryland para rodar un documental sobre una leyenda local, &quot;La bruja de Blair&quot;. No se volvió a saber de ellos. Un año después, fue encontrada la cámara con la que rodaron: mostraba los terroríficos hechos que dieron lugar a su desaparición.', 'Blair witch project', 'Daniel Myrick, Eduardo Sánchez', 'https://www.filmaffinity.com/es/film545832.html', 'https://www.youtube.com/watch?v=MBZ-POVsrlI', 1, '2022-10-11 19:40:05', '7.jpg'),
(8, 'Una pareja estadounidense que no está pasando por su mejor momento acude con unos amigos al Midsommar, un festival de verano que se celebra cada 90 años en una aldea remota de Suecia. Lo que comienza como unas vacaciones de ensueño en un lugar en el que el sol no se pone nunca, poco a poco se convierte en una oscura pesadilla cuando los misteriosos aldeanos les invitan a participar en sus perturbadoras actividades festivas.', 'Midsommar', 'Ari Aster', 'https://www.filmaffinity.com/es/film599419.html', 'https://www.youtube.com/watch?v=1Vnghdsjmd0', 1, '2022-10-11 19:40:05', '8.jpg'),
(9, 'Un hombre vive obsesionado con un libro que parece describir detalles de su vida íntima. El hombre empieza a sentirse amenazado y se vuelve paranoico debido a un número que se repite una y otra vez en el libro: el 23.', 'The Number 23', 'Joel Schumacher', 'https://www.filmaffinity.com/es/film768186.html', 'https://www.youtube.com/watch?v=TUTlOC4mVQ8', 1, '2022-10-11 19:40:05', '9.jpg'),
(10, 'Con la Tierra en guerra y en mitad de una crisis energética, un equipo de astronautas se encuentra en el espacio tratando de dar con una solución a los problemas del planeta. Pero durante una maniobra fallida quedan flotando sin saber muy bien por qué y sin saber cómo volver a su lugar de origen. Las cosas dentro de la nave ocultan una realidad mucho más terrorífica.', 'The Cloverfield Paradox', 'William Eubank', 'https://www.filmaffinity.com/es/film994565.html', 'https://www.youtube.com/watch?v=jrxBaaINseI', 1, '2022-10-11 19:40:05', '10.jpg'),
(11, 'Tres estudiantes desaparecen sin dejar rastro cuando estaban investigando la pista de un hacker de ordenadores. Todo empieza cuando Nic (Brenton Thwaites), su novia Haley (Olivia Cooke) y su mejor amigo Jonah (Beau Knapp), que viajan por carretera a través del Suroeste, dan un rodeo para localizar a un genio informático que ya ha conseguido colarse en los sistemas del MIT y sacar a la luz fallos de seguridad. Los jóvenes han despertado la curiosidad del misterioso hacker, un interés mutuo. Al ponerse en contacto, de repente, todo se oscurece. Cuando Nic recobra el conocimiento, tiene la impresión de estar viviendo una pesadilla: sus amigos no aparecen y a él lo está interrogando el Dr. Wallace Damon (Fishburne). Mientras se libra una batalla de ingenios entre ambos, Nic busca un modo de liberarse', 'The signal', 'William Eubank', 'https://www.filmaffinity.com/es/film994565.html', 'https://www.youtube.com/watch?v=gwgfeR2pMuE', 1, '2022-10-11 19:40:05', '11.jpg'),
(12, 'Donnie Darko és un thriller psicològic de ciència-ficció de 2001 escrit i dirigit per Richard Kelly i produït per Flower Films. La pel·lícula està protagonitzada per Jake Gyllenhaal, Jena Malone, Maggie Gyllenhaal, Drew Barrymore, Mary McDonnell, Katharine Ross, Patrick Swayze, Noah Wyle, Stu Stone, Daveigh Chase i James Duval. Ambientada a l’octubre de 1988, el film explica la història de Donnie Darko, un adolescent problemàtic que escapa per poc d’un estrany accident i que té visions de Frank, una misteriosa figura en una disfressa de conill que l’informa que el món acabarà en només 28 dies. Frank comença a manipular a Donnie per cometre diversos crims.', 'Donnie Darko', 'Richard Kelly', 'https://www.filmaffinity.com/es/film645363.html', 'https://www.youtube.com/watch?v=rPeGaos7DB4', 1, '2022-10-11 19:40:05', '12.jpg'),
(14, 'Cosas extrañas comienzan a suceder en casa de los Graham tras la muerte de la abuela y matriarca, que deja en herencia su casa a su hija Annie. Annie Graham, una galerista casada y con dos hijos, no tuvo una infancia demasiado feliz junto a su madre, y cree que la muerte de ésta puede hacer que pase página. Pero todo se complica cuando su hija menor comienza a ver figuras fantasmales, que también empiezan a aparecer ante su hermano.', 'Hereditary', 'Ari Aster', 'https://www.filmaffinity.com/es/film118012.html', 'https://www.youtube.com/watch?v=yiPvtoNMRa4', 2, '2022-10-11 19:40:05', '14.jpg'),
(15, 'Tres amigos viajan hasta el Area 51, en Nevada, para descubrir los misterios que esconde la enigmática localización.', 'Area 51', 'Oren Peli', 'https://www.filmaffinity.com/es/film439336.html', 'https://www.youtube.com/watch?v=jg1Jt2Ft6xg', 2, '2022-10-11 19:40:05', '15.jpg'),
(16, 'Un joven afroamericano visita a la familia de su novia blanca, un matrimonio adinerado. Para Chris (Daniel Kaluuya) y su novia Rose (Allison Williams) ha llegado el momento de conocer a los futuros suegros, por lo que ella le invita a pasar un fin de semana en el campo con sus padres, Missy (Catherine Keener) y Dean (Bradley Whitford). Al principio, Chris piensa que el comportamiento &quot;demasiado&quot; complaciente de los padres se debe a su nerviosismo por la relación interracial de su hija, pero a medida que pasan las horas, una serie de descubrimientos cada vez más inquietantes le llevan a descubrir una verdad inimaginable.', 'Get Out', 'Curabitur ullamcorper, est at gravida aliquetJordan Peele', 'https://www.filmaffinity.com/es/film642856.html', 'https://www.youtube.com/watch?v=DzfpyUB60YY', 2, '2022-10-11 19:40:05', '16.jpg'),
(17, 'Cuando naves extraterrestres comienzan a llegar a la Tierra, los altos mandos militares piden ayuda a una experta lingüista (Amy Adams) para intentar averiguar si los alienígenas vienen en son de paz o suponen una amenaza. Poco a poco la mujer intentará aprender a comunicarse con los extraños invasores, poseedores de un lenguaje propio, para dar con la verdadera y misteriosa razón de la visita extraterrestre... Adaptación del relato corto &quot;The Story of Your Life&quot; del escritor Ted Chiang, ganador de los reconocidos premios de ciencia ficción Hugo y Nebula.', 'Arrival', 'Denis Villeneuve', 'https://www.filmaffinity.com/es/film420650.html', 'https://www.youtube.com/watch?v=tFMo3UJ4B4g', 2, '2022-10-11 19:40:05', '17.jpg'),
(18, 'En el año de 2092, Nemo Nobody, que tiene 120 años, es el último ser humano mortal de la Tierra y vive rodeado de hombres que han alcanzado la inmortalidad gracias a increíbles avances científicos. Cuando Nemo se encuentra en su lecho de muerte, recuerda varias posibles existencias y matrimonios que no llegó a vivir.', 'Mr. Nobody', 'Jaco Van Dormael', 'https://www.filmaffinity.com/es/film716107.html', 'https://www.youtube.com/watch?v=vXf3gVYXlHg', 2, '2022-10-11 19:40:05', '18.jpg'),
(19, 'El doctor Malcom Crowe es un conocido psicólogo infantil de Philadelphia que vive obsesionado por el doloroso recuerdo de un joven paciente desequilibrado al que fue incapaz de ayudar. Cuando conoce a Cole Sear, un aterrorizado y confuso niño de ocho años que necesita tratamiento, ve que se le presenta la oportunidad de redimirse haciendo todo lo posible por ayudarlo. Sin embargo, el doctor Crowe no está preparado para conocer la terrible verdad acerca del don sobrenatural de su paciente: recibe visitas no deseadas de espíritus atormentados.', 'The Sixth Sense', 'M. Night Shyamalan', 'https://www.filmaffinity.com/es/film607127.html', 'https://www.youtube.com/watch?v=3-ZP95NF_Wk', 2, '2022-10-11 19:40:05', '19.jpg'),
(20, 'La memoria de Leonard, un investigador de una agencia de seguros, está irreversiblemente dañada debido a un golpe sufrido en la cabeza cuando intentaba evitar el asesinato de su mujer: éste es el último hecho que recuerda del pasado. La memoria reciente la ha perdido: los hechos cotidianos desaparecen de su mente en unos minutos. Así pues, para investigar e intentar vengar el asesinato de su esposa tiene que recurrir a la ayuda de una cámara instantánea y a las notas tatuadas en su cuerpo.', 'Memento', 'Christopher Nolan', 'https://www.filmaffinity.com/es/film931317.html', 'https://www.youtube.com/watch?v=HDWylEQSwFo&amp;pp=ugMICgJlcxABGAE%3D', 2, '2022-10-11 19:40:05', '20.jpg'),
(21, 'Un grupo de jóvenes se embarca en una aventura cuando descubren planes secretos para construir una máquina del tiempo, que utilizarán para arreglar sus problemas y obtener beneficios personales.', 'Project Almanac', 'Dean Israelite', 'https://www.filmaffinity.com/es/film796256.html', 'https://www.youtube.com/watch?v=ZALqGuwI_DE', 2, '2022-10-11 19:40:05', '21.jpg'),
(22, 'Jules y Vincent, dos asesinos a sueldo con no demasiadas luces, trabajan para el gángster Marsellus Wallace. Vincent le confiesa a Jules que Marsellus le ha pedido que cuide de Mia, su atractiva mujer. Jules le recomienda prudencia porque es muy peligroso sobrepasarse con la novia del jefe. Cuando llega la hora de trabajar, ambos deben ponerse &quot;manos a la obra&quot;. Su misión: recuperar un misterioso maletín.', 'Pulp Fiction', 'Quentin Tarantino', 'https://thiscatdoesnotexist.com/', 'https://www.youtube.com/watch?v=s7EdQ4FqbhY', 2, '2022-10-11 19:40:05', '22.jpg'),
(23, 'Cinta de tensión psicológica que nos sitúa en un escenario opresivo donde un grupo de candidatos competirán por hacerse con un jugoso puesto de trabajo. Las reglas son simples: nada de preguntas, nada de salir de la habitación y, por último, nada de estropear el folio del examen (un folio que, por otra parte, está en blanco). Tienen 80 minutos...', 'Exam', 'Stuart Hazeldine', 'https://www.filmaffinity.com/es/film408909.html', 'https://www.youtube.com/watch?v=hbivC9ztGOE', 2, '2022-10-11 19:40:05', '23.jpg'),
(24, 'Jack Torrance se traslada con su mujer y su hijo de siete años al impresionante hotel Overlook, en Colorado, para encargarse del mantenimiento de las instalaciones durante la temporada invernal, época en la que permanece cerrado y aislado por la nieve. Su objetivo es encontrar paz y sosiego para escribir una novela. Sin embargo, poco después de su llegada al hotel, al mismo tiempo que Jack empieza a padecer inquietantes trastornos de personalidad, se suceden extraños y espeluznantes fenómenos paranormales.', 'The Shining', 'Stanley Kubrick', 'https://www.filmaffinity.com/es/film598422.html', 'https://www.youtube.com/watch?v=FZQvIJxG9Xs', 2, '2022-10-11 19:40:05', '24.jpg'),
(48, 'Joel (Jim Carrey) recibe un terrible golpe cuando descubre que su novia Clementine (Kate Winslet) ha hecho que borren de su memoria todos los recuerdos de su tormentosa relación. Desesperado, se pone en contacto con el creador del proceso, el Dr. Howard Mierzwiak, para que borre a Clementine de su memoria. Pero cuando los recuerdos de Joel empiezan a desaparecer de pronto redescubre su amor por Clementine. Desde lo más profundo de su cerebro intentará parar el proceso.', 'Eternal Sunshine of the Spotless Mind', 'Michel Gondry', 'https://www.filmaffinity.com/es/film982810.html', 'https://www.youtube.com/watch?v=yE-f1alkq9I', 3, '2022-10-15 16:32:57', '48.jpg'),
(49, 'Trevor Reznik, un empleado de una fábrica, padece desde hace un año un grave problema de insomnio, un mal que él oculta y que le provoca terribles alucinaciones. Debido a la fatiga se ha deteriorado tanto su salud física como su salud mental. Repelidos por su aspecto físico, sus compañeros de trabajo primero le evitan, y después se volverán contra él cuando uno de ellos pierde un brazo en un accidente en el que Trevor se ve involucrado.', 'The Machinist', 'Brad Anderson', 'https://www.filmaffinity.com/es/film361537.html', 'https://www.youtube.com/watch?v=H0fuHY4U1UA', 3, '2022-10-15 16:35:29', '49.jpg'),
(51, 'Un agente especial (Ethan Hawke) de un departamento secreto del gobierno, una agencia creada en los años 80 que permite realizar viajes en el tiempo, tendrá que realizar una compleja serie de &quot;saltos&quot; hacia atrás en el tiempo con el fin de detener al conocido como &quot;el terrorista fallido&quot; (The Fizzle Bomber), un individuo que está poniendo bombas por todo el país con miles de víctimas. En uno de sus viajes a los 70, el agente, que trabaja encubierto como camarero de un bar, conoce a un hombre que le narra una historia extraordinaria...', 'Predestination', 'Michael Spierig, Peter Spierig, The Spierig Brothers', 'https://www.filmaffinity.com/es/film758826.html', 'https://www.youtube.com/watch?v=xxG-YfedrfU', 3, '2022-10-15 16:38:39', '51.jpg'),
(52, 'La película de ciencia-ficción por excelencia de la historia del cine narra los diversos periodos de la historia de la humanidad, no sólo del pasado, sino también del futuro. Hace millones de años, antes de la aparición del &quot;homo sapiens&quot;, unos primates descubren un monolito que los conduce a un estadio de inteligencia superior. Millones de años después, otro monolito, enterrado en una luna, despierta el interés de los científicos. Por último, durante una misión de la NASA, HAL 9000, una máquina dotada de inteligencia artificial, se encarga de controlar todos los sistemas de una nave espacial tripulada.', '2001: A Space Odyssey', 'Stanley Kubrick', 'https://www.filmaffinity.com/es/film171099.html', 'https://www.youtube.com/watch?v=oR_e9y-bka0', 3, '2022-10-15 16:40:15', '52.jpg'),
(53, 'Dom Cobb (DiCaprio) es un experto en el arte de apropiarse, durante el sueño, de los secretos del subconsciente ajeno. La extraña habilidad de Cobb le ha convertido en un hombre muy cotizado en el mundo del espionaje, pero también lo ha condenado a ser un fugitivo y, por consiguiente, a renunciar a llevar una vida normal. Su única oportunidad para cambiar de vida será hacer exactamente lo contrario de lo que ha hecho siempre: la incepción, que consiste en implantar una idea en el subconsciente en lugar de sustraerla. Sin embargo, su plan se complica debido a la intervención de alguien que parece predecir cada uno de sus movimientos, alguien a quien sólo Cobb podrá descubrir.', 'Inception', 'Christopher Nolan', 'https://www.filmaffinity.com/es/film971380.html', 'https://www.youtube.com/watch?v=YoHD9XEInc0', 3, '2022-10-15 16:44:03', '53.jpg'),
(54, 'A una mujer (Jennifer Lawrence) le pilla por sorpresa que su marido (Javier Bardem), un escritor en pleno bloqueo creativo, deje entrar en casa a unas personas a las que no había invitado. Poco a poco el comportamiento de su marido va siendo más extraño, y ella empieza a estresarse y a intentar echar a todo el mundo.', 'Mother!', 'Darren Aronofsky', 'https://www.filmaffinity.com/es/film594704.html', 'https://www.youtube.com/watch?v=XpICoc65uh0', 3, '2022-10-15 21:20:50', '54.jpg'),
(56, 'En Finlandia, en 1923, el paso de un cometa hizo que los habitantes de un pueblo quedaran completamente desorientados; incluso una mujer llegó a llamar a la policía denunciando que el hombre que estaba en su casa no era su marido. Décadas más tarde, un grupo de amigos recuerda este caso mientras cenan, brindan y se preparan para ver pasar un cometa...', 'Coherence', 'James Ward Byrkit', 'https://www.filmaffinity.com/es/film974551.html', 'https://www.youtube.com/watch?v=sEceDz1Rodc', 3, '2022-10-17 18:18:20', '56.jpg'),
(57, 'Unos jóvenes ladrones creen haber encontrado la oportunidad de cometer el robo perfecto. Su objetivo será un ciego solitario, poseedor de miles de dólares ocultos. Pero tan pronto como entran en su casa serán conscientes de su error, pues se encontrarán atrapados y luchando por sobrevivir contra un psicópata con sus propios y temibles secretos', 'Don\'t Breathe', 'Fede Álvarez', 'https://www.filmaffinity.com/es/film609968.html', 'https://www.youtube.com/watch?v=76yBTNDB6vU', 3, '2022-10-18 15:56:18', '57.jpg'),
(58, 'Tanto Gi Taek (Song Kang-ho) como su familia están sin trabajo. Cuando su hijo mayor, Gi Woo (Choi Woo-sik), empieza a dar clases particulares en casa de Park (Lee Seon-gyun), las dos familias, que tienen mucho en común pese a pertenecer a dos mundos totalmente distintos, comienzan una interrelación de resultados imprevisibles.', 'Parasite', 'Bong Joon-ho', 'https://www.filmaffinity.com/es/film520465.html', 'https://www.youtube.com/watch?v=isOGD_7hNIY', 3, '2022-10-18 15:57:56', '58.jpg'),
(59, 'Para sobrellevar el insomnio crónico que sufre desde su regreso de Vietnam, Travis Bickle (Robert De Niro) trabaja como taxista nocturno en Nueva York. Es un hombre insociable que apenas tiene contacto con los demás, se pasa los días en el cine y vive prendado de Betsy (Cybill Shepherd), una atractiva rubia que trabaja como voluntaria en una campaña política. Pero lo que realmente obsesiona a Travis es comprobar cómo la violencia, la sordidez y la desolación dominan la ciudad. Y un día decide pasar a la acción.', 'Taxi Driver', 'Martin Scorsese', 'https://www.filmaffinity.com/es/film396074.html', 'https://www.youtube.com/watch?v=UUxD4-dEzn0', 3, '2022-10-18 16:02:32', '59.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `nickname` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(32) NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `reset_token` text NOT NULL,
  `remember_me_token` text NOT NULL,
  `social_provider` enum('','Twitter','GitHub','Google') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

--
-- Truncar tablas antes de insertar `users`
--

TRUNCATE TABLE `users`;
--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`nickname`, `email`, `password`, `id`, `reset_token`, `remember_me_token`, `social_provider`) VALUES
('Anakin', 'anakinskywalker@example.com', 'dd9d21e22391090ddce7c6ed58c6412d', 1, '', '', ''),
('Usuari1', 'user@example.com', 'dd9d21e22391090ddce7c6ed58c6412d', 2, '', '', ''),
('Luke', 'lukeskywalker@sapalomera.cat', '', 3, '', 'da8aa95050bdaede6d7415e9af84ef1a', 'GitHub'),
('Obi-Wan', 'Obiwankenobi.02@gmail.com', '', 4, '', '', 'Twitter');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
