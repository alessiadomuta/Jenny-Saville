-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Feb 02, 2023 alle 16:46
-- Versione del server: 10.4.27-MariaDB
-- Versione PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `prova`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `opere`
--

CREATE TABLE `opere` (
  `immagine` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `titolo` tinytext CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `id` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `autore` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `data` year(4) DEFAULT NULL,
  `tecnica` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `larghezza` int(11) DEFAULT NULL,
  `altezza` int(11) DEFAULT NULL,
  `href` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `descrizione` text CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `keywords` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `opere`
--

INSERT INTO `opere` (`immagine`, `titolo`, `id`, `autore`, `data`, `tecnica`, `larghezza`, `altezza`, `href`, `descrizione`, `keywords`) VALUES
('images/opera1.png', '<span lang=\"en\">Propped</span>', '1', '<span lang=\"en\">Jenny Saville</span>', 1992, 'olio su tela', 214, 183, 'opera1', 'In questo lavoro <span lang=\"en\">Jenny Saville </span>rappresenta il <strong>corpo</strong> di una <strong>donna</strong> in tutto il suo <strong>volume</strong>, senza nascondere niente. Si tratta di un corpo non convenzionale, che si discosta dai canoni classici di bellezza. Le proporzioni sono esagerate, la posa è languida e viscerale, non ha paura di farsi vedere. Le <strong>imperfezioni</strong> sono in mostra, eppure la figura ci appare estremamente umana, riconoscibile e quasi <strong>vulnerabile</strong> nella sua nudità. Questo è uno dei suoi lavori più riusciti, dalle pennellate spesse che diventano carne, alla grandezza del dipinto (che misura circa due metri per due!) emerge l’uomo, la donna in tutta la sua forma.', 'Propped, corpo, donna, volume, imperfezioni, vulnerabile'),
('images/opera13.png', '<span lang=\"en\">Strategy</span>', '13', '<span lang=\"en\">Jenny Saville</span>', 2017, 'olio su tela', 250, 120, 'opera13', 'L’opera rappresenta la stessa donna vista da tre punti diversi: di fronte, lateralmente e a tre quarti. Le forme sono abbondanti, i colori pallidi. Indossa un <strong>intimo</strong> bianco, e ha i capelli scuri. Richiama le forme della <strong>dea madre</strong>, della <strong>natura</strong> in tutta la sua ricchezza. L\'artista rappresenta la femminilità nell\'<strong>abbondanza</strong>, non nasconde niente.', 'Strategy, intimo, dea madre, natura, abbondanza'),
('images/opera14.png', '<span lang=\"en\">Closed Contact</span> #3', '14', '<span lang=\"en\">Jenny Saville</span>', 0000, 'stampa cromogenica montata su <span lang=\"en\">plexiglass</span>', 283, 182, 'opera14', 'L’aspetto più affascinante di quest’opera è forse il suo formato. Un corpo schiacciato su un vetro, per la creazione di una stampa unica e tanto reale da non sembrarlo affatto. Si tratta di un’opera che non nasconde niente e, anzi, mette in evidenza, mostra allo spettatore, con il chiaro scopo di esplorare il <strong>corpo</strong> e le sue forme. La parola che passa per la mente è &quot;<strong>carne</strong>&quot;, <strong>pelle</strong>, <strong>massa</strong>, unghie, tutto vivido e visibile. <span lang=\"en\">Saville</span> realizza tanti di questi esperimenti, il titolo lo dice bene: <span lang=\"en\">Closed Contact</span> #3, questo è solo il terzo. Le suggestioni e le implicazioni che quest’opera istilla nella mente dello spettatore sono tante: non si può però negare un senso di fascinazione, quasi di attrazione verso il corpo e di curiosità sulle forme che può assumere. Vent’anni dopo una scrittrice, sempre britannica scriverà un libro: “La carne”, Emma <span lang=\"en\">Glass</span>, 2018. Un libro inusuale, ambiguo, che esplora appunto questi temi, seguitemi per altri consigli.', 'Closed Contact, carne, pelle, massa'),
('images/opera16.png', '<span lang=\"en\">Violence</span>', '16', '<span lang=\"en\">Jenny Saville</span>', 2015, 'olio su tela', 150, 100, 'opera16', 'L’opera appartiene agli studi sui cadaveri: è rappresentato un volto in <strong>sofferenza</strong>. La figura non è chiara, ma è chiaro che è stata ferita prima della <strong>morte</strong> della stessa. Il <strong>rosso</strong> predomina sulla <strong>pelle</strong> sanguinante, gli occhi chiusi sono gonfi e la bocca è aperta. Lo sfondo è freddo, asettico e verde, simbolo di decadenza e morte.', 'Violence, sofferenza, morte, rosso, pelle'),
('images/opera17.png', '<span lang=\"en\">Hanged</span>', '17', '<span lang=\"en\">Jenny Saville</span>', 2019, 'olio su tela', 100, 200, 'opera17', 'Questa è una delle opere più inusuali nella produzione di Saville. Si rifà al suo periodo di studio del corpo e dei cadaveri, nel quale l’artista si serviva di <strong>cadaveri</strong> di maiali per i suoi esperimenti. Quello che vediamo raffigurato nel dipinto è proprio il corpo di un <strong>maiale</strong>, appeso al muro e tagliato, tanto che si vedono le <strong>ossa</strong>. A primo impatto non riusciamo a capire di che cosa si tratti, poi notiamo che si tratta di <strong>carne</strong>. Il dubbio arriva spontaneo: è un uomo? La cosa appesa e maciullata è il corpo di un essere umano? Poi ci accorgiamo che non può essere, ma la sensazione rimane: si tratta di un corpo che ci è comunque familiare, un’immagine che ci provoca rabbia, <strong>disgusto</strong> e infine un senso di tristezza. In quest’opera ancora di più vediamo come siamo fatti e la sensazione che ci lascia è come di aridità, desolazione, un senso di pesantezza che mi ricorda (per i più appassionati) i libri di Houellebecq.', 'Hanged, maiale, cadavere, ossa, carne, disgusto'),
('images/opera18.png', '<span lang=\"en\">Rupture</span>', '18', '<span lang=\"en\">Jenny Saville</span>', 2020, 'olio e acrilico su tela', 200, 160, 'opera18', 'Il tratto caratteristico di quest’opera è la resa dei colori. Il predominio del <strong>rosso</strong> sugli altri colori rimanda ad una sensazione di violenza, di ferocia; sensazioni che vengono accentuate dalle pennellate sporche e quasi ingombranti tipiche dello stile di <span lang=\"en\">Saville</span>. Le caratteristiche del <strong>volto</strong> sono, al contrario, rappresentate con cura: dall’espressione degli occhi, che ci sembra indifferente, ma che nasconde un velo di <strong>tristezza</strong>, – le iridi sono lucide, la palpebra è cascante e due sottili fili di giallo ricordano delle lacrime – alla bocca semiaperta, rivolta verso il basso. <span lang=\"en\">Saville</span> ci porta in un mondo saturo, <strong>psichedelico</strong>, di rotture ed esplosioni.', 'Rupture, volto, rosso, tristezza, psichedelico'),
('images/opera19.png', '<span lang=\"en\">Freezing</span>', '19', '<span lang=\"en\">Jenny Saville</span>', 2013, 'olio su tela', 100, 150, 'opera19', 'L’opera appartiene allo studio sui volti: rappresenta il <strong>volto</strong> di una <strong>ragazza</strong>, ma a differenza degli altri quadri, l’atmosfera è molto <strong>fredda</strong>, come se il paesaggio fosse di neve e nebbia. La ragazza è vestita pesante, e la luce proviene lateralmente, ma è intensa. I colori sono il bianco, il grigio, il marrone della giacca. La figura non è nitida ma l’impatto dello <strong>sguardo</strong> rimane molto intenso, dritto verso l’osservatore.', 'Freezing, volto, ragazza, fredda, sguardo'),
('images/opera2.png', '<span lang=\"en\">Prop</span>', '2', '<span lang=\"en\">Jenny Saville</span>', 1992, 'olio su tela', 214, 183, 'opera2', 'Con questo lavoro <span lang=\"en\">Jenny Saville</span> continua lo studio sul <strong>corpo</strong> umano. La figura rappresentata è una <strong>donna formosa</strong> seduta su una sedia, sembra che stia scivolando verso lo spettatore, in una posa scomoda, raggomitolata su sé stessa. La luce definisce le sue forme, ogni dettaglio è evidenziato e reale e riconoscibile agli occhi di chi guarda. L’artista dimostra una grande conoscenza del corpo, di come è fatto, e come si dispone in una posa non convenzionale. Si intravedono rimandi alla scultura del paleolitico, alle statue della dea madre, <strong>prosperosa</strong> e <strong>femminile</strong>, e onesta.', 'Prop, donna, corpo, formosa, prosperosa, femminile'),
('images/opera3.png', '<span lang=\"en\">The bride</span>', '3', '<span lang=\"en\">Jenny Saville</span>', 1992, 'olio su tela', 142, 99, 'opera3', 'In questo dipinto <span lang=\"en\">Jenny Saville</span> rappresenta una <strong>sposa</strong>. La figura è vista dal basso, indossa un vestito atipico per una sposa, sembra quasi una sottoveste. I colori sono spenti e il <span lang=\"fr\">bouquet</span> è misero. In contrapposizione all’abbigliamento la posa è solenne, <strong>sacra</strong>: la figura ha lo sguardo rivolto verso l’alto, le mani congiunte come in <strong>preghiera</strong>. Ad una seconda occhiata si notano i muscoli nelle braccia, le mani grandi e il volto ambiguo con una striscia rossa sulla guancia, e non ci sembra più una donna quella raffigurata nel dipinto. La scena è <strong>tragica</strong>, <strong>eroica</strong> e contemporanea e gioca con gli opposti e le convenzioni di genere.', 'The bride, sposa, sacra, preghiera, tragica, eroica'),
('images/opera4.png', '<span lang=\"en\">Odysseus</span>', '4', '<span lang=\"en\">Jenny Saville</span>', 2020, 'olio e acrilico su tela', 150, 120, 'opera4', 'In questo dipinto <span lang=\"en\">Jenny Saville</span> rappresenta un <strong>volto</strong>. Il suo stile unico è tutto in evidenza, va oltre il figurativo e l’astratto per regalarci un <strong>ritratto</strong> contemporaneo e umano. Le pennellate sono grossolane, aggressive, ma i <strong>dettagli</strong> sono curati, e quello che viene mostrato allo spettatore è un volto limpido, <strong>vulnerabile</strong>, qualcosa che – ci rendiamo conto –  vediamo solo nei momenti più intimi di un incontro. <span lang=\"en\">Saville</span> dimostra una profonda comprensione dell’uomo, ci regala l’<strong>onestà</strong> di uno sguardo, il viaggio caotico dell’anima.', 'Odysseus, volto, ritratto, dettagli, vulnerabile, onestà'),
('images/opera5.png', '<span lang=\"en\">Horizon</span>', '5', '<span lang=\"en\">Jenny Saville</span>', 2019, 'olio su tela', 100, 150, 'opera5', 'L’opera appartiene allo studio sui volti: è rappresentato il <strong>volto</strong> di una <strong>ragazza</strong>, ma il tratto è molto più rudimentale, come se fosse uno <strong>schizzo</strong> con i colori a cera. La ragazza sta guardando in alto, alla nostra sinistra e i colori che delineano la figura sono il <strong>viola</strong>, il <strong>rosa</strong>, il giallo e l’arancione.', 'Horizon, volto, ragazza, schizzo, viola, rosa'),
('images/opera6.png', '<span lang=\"en\">Inside</span>', '6', '<span lang=\"en\">Jenny Saville</span>', 2018, 'olio su tela', 150, 100, 'opera6', 'L’opera rappresenta il <strong>volto</strong> di una giovane <strong>donna</strong> il cui <strong>sguardo</strong> è focalizzato su un punto <strong>lontano</strong>. Lo sfondo azzurro è molto liquido in contrapposizione alla solidità della forma, molto colorata.', 'Inside, volto, donna, sguardo, lontano'),
('images/opera7.png', '<span lang=\"en\">Reverse</span>', '7', '<span lang=\"en\">Jenny Saville</span>', 2002, 'olio su tela', 214, 244, 'opera7', 'In questo dipinto troviamo un <strong>volto</strong> umano riverso a terra. Gli occhi osservano lo spettatore, la bocca è semiaperta e sembra intrisa in uno strato di <strong>sangue</strong>, la faccia è appoggiata al terreno in maniera scomposta, non si vedono i capelli, ma il volto è facilmente riconoscibile come quello della stessa autrice dell’opera. Quando ci si accorge di quest’ultimo dettaglio, l’opera inizia ad assumere dei tratti inquietanti: le pennellate sono pesanti e rendono bene l’idea di un volto sfigurato, il soggetto sembra essere caduto e non avere la forza di rialzarsi, l’espressione è vuota, rassegnata, carica di <strong>tensione</strong>. Emergono da questo volto tutti gli studi di <<span lang=\"en\">Saville</span> sulla carne umana, sul corpo e le sue relazioni con il pensiero. Il fatto che la protagonista dell’opera sia lei stessa è un atto politico, sovversivo: l’artista si mostra davanti a noi <strong>sfigurata</strong> e ci sfida, a noi che stiamo a guardarla, in piedi o seduti sul nostro divano.', 'Reverse, volto, sangue, tensione, sfigurata'),
('images/opera8.png', 'Rosetta <abbr title=\"seconda\">II</abbr>', '8', '<span lang=\"en\">Jenny Saville</span>', 0000, 'olio su tela', 252, 186, 'opera8', 'In quest’opera <span lang=\"en\">Jenny Saville</span> rappresenta un <strong>volto</strong>. La testa è inclinata lateralmente, lo sguardo è penetrante, indagatore e gli occhi assumono una tonalità di <strong>azzurro</strong> innaturale. A differenza di altre sue opere, <span lang=\"en\">Saville</span> in Rosetta <abbr title=\"seconda\">II</abbr> dipinge un soggetto che sembra discostarsi dallo spettatore. L’espressione del volto, gli occhi di un colore impossibile contribuiscono a dare una sensazione di <strong>inquietudine</strong>, di allarme e le caratteristiche fisiche sembrano danneggiate, a tratti robotiche. Si rimane spiazzati in un primo momento, per poi notare altri dettagli. La figura diventa familiare e ora pare solo stanca, esausta. Ritorna quel senso di <strong>fragilità</strong>, così presente nelle opere di <span lang=\"en\">Saville</span> e che qui ritroviamo un po’ nascosta in un volto che ci allontana e ci avvicina allo stesso tempo.', 'Rosetta II, occhi azzurri, inquietudine, fragilità'),
('images/opera9.png', '<span lang=\"en\">Emptyness</span>', '9', '<span lang=\"en\">Jenny Saville</span>', 2020, 'olio su tela', 100, 150, 'opera9', 'L’opera appartiene agli studi sui volti e rappresenta il <strong>volto</strong> di una <strong>donna</strong> che sta guardando qualcosa alla nostra destra, con la testa inclinata all’indietro. Il quadro è molto <strong>rosso</strong>, intenso, ma la figura è segnata da diverse pennellate azzurre, blu, rosa. Lo sguardo della donna è <strong>stanco</strong>, <strong>vuoto</strong>, insofferente.', 'Emptyness, volto, donna, rosso, stanco, vuoto');

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `opere`
--
ALTER TABLE `opere`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
