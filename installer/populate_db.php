<?php

require_once __DIR__ . '/../src/Utility/bootstrapDoctrine.php';


use Foundation\FPersistentManager;
use Entity\EUser;
use Entity\ECategory;
use Entity\ECrochet;
use Entity\EYarn;
use Entity\EYarnWeight;
use Entity\ECreation;
use Entity\EImage;
use Entity\EComment;
use Entity\ELike;

$pm = new FPersistentManager();

// ---------------- USERS ---------------- 
$marta = new EUser(
    'marta',
    'marta@mail.com',
    '$2y$10$umfd9H.gKtAudbbkGWIRsuugHrT096hSr7sKMEzfql2HhJm/1PVhm'
);
$marta->setBio('Amministratore di CrochetHub. Qui per mantenere la community accogliente e ordinata.');
$marta->setRole('ROLE_ADMIN');

$pm->save($marta);


$gloria = new EUser(
    'gloriaLovesCrochet',
    'gloria@mail.com',
    '$2y$10$iXKiv5iD.SGzSZUtcGGhzOen/zv1.0PxNM764FMzBdJKTtWlFm.ui'
);
$gloria->setBio('Ho scoperto l’uncinetto da poco ma me ne sono innamorata subito. Mi piace sperimentare con piccoli progetti e colori pastello.');

$pm->save($gloria);


$gaia = new EUser(
    'gaia03',
    'gaia@mail.com',
    '$2y$10$IvMmcW0Rog8zeJuzwJnC0uT.7lT9XtETZg4vg2QcLoqueCMCcAx/6'
);
$gaia->setBio('L’uncinetto è il mio modo preferito per rilassarmi dopo una lunga giornata. Prediligo progetti semplici e materiali naturali.');

$pm->save($gaia);


$vasa = new EUser(
    'vasa23',
    'vasa@mail.com',
    '$2y$10$SNaIG3pLycpDTy3L8sECkufybKVwv4Ce9K8yExxE3meNRMkd/YNsW'
);

$pm->save($vasa);


$luca = new EUser(
    'luca',
    'luca@mail.com',
    '$2y$10$KlC6sUrbqsBW67wm.kjCluYEV/tXtGCJ7kNhe6Ov9kVTRizGENlQO'
);

$pm->save($luca);

// ---------- CATEGORIES ----------

$maglieria  = new ECategory('Maglieria');
$sciarpe    = new ECategory('Sciarpe');
$cappelli   = new ECategory('Cappelli');
$borse      = new ECategory('Borse');
$amigurumi  = new ECategory('Amigurumi');
$pupazzi    = new ECategory('Pupazzi');
$biancheria = new ECategory('Biancheria');
$altro      = new ECategory('Altro');

$pm->save($maglieria);
$pm->save($sciarpe);
$pm->save($cappelli);
$pm->save($borse);
$pm->save($amigurumi);
$pm->save($pupazzi);
$pm->save($biancheria);
$pm->save($altro);

// ---------- CROCHET SIZES ----------

$crochet_1   = new ECrochet(1.0);
$crochet_15  = new ECrochet(1.5);
$crochet_2   = new ECrochet(2.0);
$crochet_25  = new ECrochet(2.5);
$crochet_3   = new ECrochet(3.0);
$crochet_35  = new ECrochet(3.5);
$crochet_4   = new ECrochet(4.0);
$crochet_45  = new ECrochet(4.5);
$crochet_5   = new ECrochet(5.0);
$crochet_55  = new ECrochet(5.5);
$crochet_6   = new ECrochet(6.0);
$crochet_7   = new ECrochet(7.0);
$crochet_8   = new ECrochet(8.0);
$crochet_9   = new ECrochet(9.0);
$crochet_10  = new ECrochet(10.0);
$crochet_12  = new ECrochet(12.0);
$crochet_15x = new ECrochet(15.0);
$crochet_20  = new ECrochet(20.0);

$pm->save($crochet_1);
$pm->save($crochet_15);
$pm->save($crochet_2);
$pm->save($crochet_25);
$pm->save($crochet_3);
$pm->save($crochet_35);
$pm->save($crochet_4);
$pm->save($crochet_45);
$pm->save($crochet_5);
$pm->save($crochet_55);
$pm->save($crochet_6);
$pm->save($crochet_7);
$pm->save($crochet_8);
$pm->save($crochet_9);
$pm->save($crochet_10);
$pm->save($crochet_12);
$pm->save($crochet_15x);
$pm->save($crochet_20);


// ---------- YARNS ----------

$lana        = new EYarn('Lana');
$lanaMerino  = new EYarn('Lana Merino');
$cotone      = new EYarn('Cotone');
$mohair      = new EYarn('Mohair');
$alpaca      = new EYarn('Alpaca');
$acrilico    = new EYarn('Acrilico');
$viscosa     = new EYarn('Viscosa');
$lycra       = new EYarn('Lycra');

$pm->save($lana);
$pm->save($lanaMerino);
$pm->save($cotone);
$pm->save($mohair);
$pm->save($alpaca);
$pm->save($acrilico);
$pm->save($viscosa);
$pm->save($lycra);


// ---------- YARN WEIGHTS ----------

$thread        = new EYarnWeight('Thread');
$lace          = new EYarnWeight('0 - Lace');
$superFine     = new EYarnWeight('1 - Super Fine');
$fine          = new EYarnWeight('2 - Fine');
$light         = new EYarnWeight('3 - Light');
$medium        = new EYarnWeight('4 - Medium');
$bulky         = new EYarnWeight('5 - Bulky');
$superBulky    = new EYarnWeight('6 - Super Bulky');
$jumbo         = new EYarnWeight('7 - Jumbo');

$pm->save($thread);
$pm->save($lace);
$pm->save($superFine);
$pm->save($fine);
$pm->save($light);
$pm->save($medium);
$pm->save($bulky);
$pm->save($superBulky);
$pm->save($jumbo);


// ---------------- CREATIONS ----------------
$c1 = new ECreation(
    'Sciarpa punto base',
    'Sciarpa realizzata con un punto base, ideale anche per chi è alle prime armi. Calda, morbida e perfetta per l’inverno.'
);
$c1->setAuthor($gloria);
$c1->setYarn($lana);
$c1->setYarnWeight($bulky);
$c1->setCrochet($crochet_6);
$c1->setCategory($sciarpe);
$c1->setAccessories('Marca punti');
$pm->save($c1);


$c2 = new ECreation(
    'Pecorella amigurumi',
    'Piccolo amigurumi realizzato a mano, nato come regalo. Ho usato un filato in cotone e un uncinetto sottile per i dettagli.'
);
$c2->setAuthor($gloria);
$c2->setYarn($cotone);
$c2->setYarnWeight($fine);
$c2->setCrochet($crochet_3);
$c2->setCategory($amigurumi);
$c2->setAccessories('Marcapunti, spilli, occhi di sicurezza da 6mm');
$pm->save($c2);


$c3 = new ECreation(
    'Coperta baby',
    'Copertina per neonato dai colori delicati. Progetto rilassante, perfetto per consumare avanzi di filato.'
);
$c3->setAuthor($marta);
$c3->setYarn($lanaMerino);
$c3->setYarnWeight($medium);
$c3->setCrochet($crochet_6);
$c3->setCategory($biancheria);
$pm->save($c3);


$c4 = new ECreation(
    'Borsa handmade',
    'Borsa all’uncinetto resistente e capiente. Ho scelto un filato spesso per darle struttura.'
);
$c4->setAuthor($marta);
$c4->setYarn($lycra);
$c4->setYarnWeight($bulky);
$c4->setCrochet($crochet_10);
$c4->setCategory($borse);
$pm->save($c4);


$c5 = new ECreation(
    'Cappello invernale',
    'Cappello caldo e avvolgente, lavorato in tondo. Un progetto veloce ma molto soddisfacente.'
);
$c5->setAuthor($gaia);
$c5->setYarn($lana);
$c5->setYarnWeight($bulky);
$c5->setCrochet($crochet_8);
$c5->setCategory($cappelli);
$pm->save($c5);


$c6 = new ECreation(
    'Set di sottobicchieri',
    'Set di sottobicchieri colorati, ideali per dare un tocco handmade alla tavola.'
);
$c6->setAuthor($gaia);
$c6->setYarn($acrilico);
$c6->setYarnWeight($medium);
$c6->setCrochet($crochet_6);
$c6->setCategory($altro);
$pm->save($c6);


$c7 = new ECreation(
    'Cardigan',
    'Cardigan leggero, adatto alle mezze stagioni. Il punto utilizzato crea una trama semplice ma elegante.'
);
$c7->setAuthor($gaia);
$c7->setYarn($lana);
$c7->setYarnWeight($medium);
$c7->setCrochet($crochet_6);
$c7->setCategory($maglieria);
$pm->save($c7);


$c8 = new ECreation(
    'Scialle',
    'Scialle morbido e leggero, perfetto per le serate fresche. Ho scelto un filato sfumato per un effetto più dinamico.'
);
$c8->setAuthor($vasa);
$c8->setYarn($cotone);
$c8->setYarnWeight($medium);
$c8->setCrochet($crochet_5);
$c8->setCategory($sciarpe);
$pm->save($c8);


$c9 = new ECreation(
    'Portachiavi',
    'Piccolo portachiavi all’uncinetto, nato come progetto veloce per provare un nuovo filato.'
);
$c9->setAuthor($vasa);
$c9->setYarn($cotone);
$c9->setYarnWeight($fine);
$c9->setCrochet($crochet_3);
$c9->setCategory($amigurumi);
$c9->setAccessories('occhi di sicurezza, catenella portachiavi, ago da lana');
$pm->save($c9);


$c10 = new ECreation(
    'Funko pop amigurumi',
    'Funko pop personalizzato realizzato per una laurea'
);
$c10->setAuthor($marta);
$c10->setYarn($cotone);
$c10->setYarnWeight($fine);
$c10->setCrochet($crochet_3);
$c10->setCategory($amigurumi);
$c10->setAccessories('occhi di sicurezza 9mm, cartoncini colorati, filo di ferro, ago da lana');
$pm->save($c10);


$c11 = new ECreation(
    'Tartaruga',
    'Simpatico amigurumi, perfetto come ciondolo per borse mare'
);
$c11->setAuthor($gloria);
$c11->setYarn($cotone);
$c11->setYarnWeight($fine);
$c11->setCrochet($crochet_3);
$c11->setCategory($amigurumi);
$pm->save($c11);


$c12 = new ECreation(
    'Omini',
    'Simpatici omini con arti piegabili'
);
$c12->setAuthor($gloria);
$c12->setYarn($cotone);
$c12->setYarnWeight($fine);
$c12->setCrochet($crochet_3);
$c12->setCategory($amigurumi);
$pm->save($c12);


$c13 = new ECreation(
    'Borsa clutch',
    'Borsa elegante perfetta per serate estive o eleganti'
);
$c13->setAuthor($gloria);
$c13->setYarn($cotone);
$c13->setYarnWeight($bulky);
$c13->setCrochet($crochet_5);
$c13->setCategory($borse);
$c13->setAccessories('Paillettes, chiusura a molla');
$pm->save($c13);


$c14 = new ECreation(
    'Borsa a spalla',
    'Delicata borsa estiva con manico spesso, realizzata con fettuccia in cotone'
);
$c14->setAuthor($gloria);
$c14->setYarn($cotone);
$c14->setYarnWeight($bulky);
$c14->setCrochet($crochet_8);
$c14->setCategory($borse);
$pm->save($c14);


$c15 = new ECreation(
    'Borsa clutch metallizzata',
    'Borsa clutch realizzata con fettuccia metallizzata'
);
$c15->setAuthor($gloria);
$c15->setYarn($acrilico);
$c15->setYarnWeight($bulky);
$c15->setCrochet($crochet_7);
$c15->setCategory($borse);
$pm->save($c15);


$c16 = new ECreation(
    'Borsa clutch pelliccia',
    'Borsa clutch realizzata con filato in pelliccia'
);
$c16->setAuthor($gloria);
$c16->setYarn($acrilico);
$c16->setYarnWeight($bulky);
$c16->setCrochet($crochet_12);
$c16->setCategory($borse);
$c16->setAccessories('Chiusura a molla per borse');
$pm->save($c16);


$c17 = new ECreation(
    'Borsa a spalla',
    'Borsa realizzata con doppia stringa di fettuccia in lycra'
);
$c17->setAuthor($gloria);
$c17->setYarn($lycra);
$c17->setYarnWeight($bulky);
$c17->setCrochet($crochet_10);
$c17->setCategory($borse);
$pm->save($c17);



// ---------------- IMAGES ----------------

// Creazione 1
$i1 = new EImage();
$i1->setPath('uploads/creations/1/img_0.jpeg');
$i1->setPosition(0);
$i1->setCreation($c1);
$pm->save($i1);

// Creazione 2
$i2 = new EImage();
$i2->setPath('uploads/creations/2/img_0.jpeg');
$i2->setPosition(0);
$i2->setCreation($c2);
$pm->save($i2);

// Creazione 3
$i3 = new EImage();
$i3->setPath('uploads/creations/3/img_0.jpeg');
$i3->setPosition(0);
$i3->setCreation($c3);
$pm->save($i3);

// Creazione 4
$i4 = new EImage();
$i4->setPath('uploads/creations/4/img_0.jpeg');
$i4->setPosition(0);
$i4->setCreation($c4);
$pm->save($i4);

// Creazione 5
$i5 = new EImage();
$i5->setPath('uploads/creations/5/img_0.jpeg');
$i5->setPosition(0);
$i5->setCreation($c5);
$pm->save($i5);

// Creazione 7
$i6 = new EImage();
$i6->setPath('uploads/creations/7/img_0.jpeg');
$i6->setPosition(0);
$i6->setCreation($c7);
$pm->save($i6);

// Creazione 8
$i7 = new EImage();
$i7->setPath('uploads/creations/8/img_0.jpeg');
$i7->setPosition(0);
$i7->setCreation($c8);
$pm->save($i7);

// Creazione 9
$i8 = new EImage();
$i8->setPath('uploads/creations/9/img_0.jpeg');
$i8->setPosition(0);
$i8->setCreation($c9);
$pm->save($i8);

// Creazione 10
$i9 = new EImage();
$i9->setPath('uploads/creations/10/img_0.jpeg');
$i9->setPosition(0);
$i9->setCreation($c10);
$pm->save($i9);

// Creazione 11 (2 immagini)
$i10 = new EImage();
$i10->setPath('uploads/creations/11/img_0.jpeg');
$i10->setPosition(0);
$i10->setCreation($c11);
$pm->save($i10);

$i11 = new EImage();
$i11->setPath('uploads/creations/11/img_1.jpeg');
$i11->setPosition(1);
$i11->setCreation($c11);
$pm->save($i11);

// Creazione 12 (2 immagini)
$i12 = new EImage();
$i12->setPath('uploads/creations/12/img_0.jpeg');
$i12->setPosition(0);
$i12->setCreation($c12);
$pm->save($i12);

$i13 = new EImage();
$i13->setPath('uploads/creations/12/img_1.jpeg');
$i13->setPosition(1);
$i13->setCreation($c12);
$pm->save($i13);

// Creazione 13
$i14 = new EImage();
$i14->setPath('uploads/creations/13/img_0.jpeg');
$i14->setPosition(0);
$i14->setCreation($c13);
$pm->save($i14);

// Creazione 14 (3 immagini)
$i15 = new EImage();
$i15->setPath('uploads/creations/14/img_0.jpeg');
$i15->setPosition(0);
$i15->setCreation($c14);
$pm->save($i15);

$i16 = new EImage();
$i16->setPath('uploads/creations/14/img_1.jpeg');
$i16->setPosition(1);
$i16->setCreation($c14);
$pm->save($i16);

$i17 = new EImage();
$i17->setPath('uploads/creations/14/img_2.jpeg');
$i17->setPosition(2);
$i17->setCreation($c14);
$pm->save($i17);

// Creazione 15 (2 immagini)
$i18 = new EImage();
$i18->setPath('uploads/creations/15/img_0.jpeg');
$i18->setPosition(0);
$i18->setCreation($c15);
$pm->save($i18);

$i19 = new EImage();
$i19->setPath('uploads/creations/15/img_1.jpeg');
$i19->setPosition(1);
$i19->setCreation($c15);
$pm->save($i19);

// Creazione 16 (2 immagini)
$i20 = new EImage();
$i20->setPath('uploads/creations/16/img_0.jpeg');
$i20->setPosition(0);
$i20->setCreation($c16);
$pm->save($i20);

$i21 = new EImage();
$i21->setPath('uploads/creations/16/img_1.jpeg');
$i21->setPosition(1);
$i21->setCreation($c16);
$pm->save($i21);

// Creazione 17 (2 immagini)
$i22 = new EImage();
$i22->setPath('uploads/creations/17/img_0.jpeg');
$i22->setPosition(0);
$i22->setCreation($c17);
$pm->save($i22);

$i23 = new EImage();
$i23->setPath('uploads/creations/17/img_1.jpeg');
$i23->setPosition(1);
$i23->setCreation($c17);
$pm->save($i23);



// ---------------- COMMENTS ----------------

// (1) marta → c17
$cm1 = new EComment('Molto carino! Mi piacciono soprattutto i colori che hai scelto');
$cm1->setAuthor($marta);
$cm1->setCreation($c17);
$pm->save($cm1);

// (2) marta → c17
$cm2 = new EComment('Che tipo di filato hai usato? Sembra molto morbido');
$cm2->setAuthor($marta);
$cm2->setCreation($c17);
$pm->save($cm2);

// (3) marta → c16
$cm3 = new EComment('Bellissimo progetto, soprattutto per essere fatto a mano!');
$cm3->setAuthor($marta);
$cm3->setCreation($c16);
$pm->save($cm3);

// (4) marta → c9
$cm4 = new EComment('Forse con un uncinetto leggermente più piccolo verrebbe ancora più compatto.');
$cm4->setAuthor($marta);
$cm4->setCreation($c9);
$pm->save($cm4);

// (5) marta → c15
$cm5 = new EComment('Quanto tempo ci hai messo per finirlo?');
$cm5->setAuthor($marta);
$cm5->setCreation($c15);
$pm->save($cm5);

// (6) vasa → c17
$cm6 = new EComment('Quanto tempo ci hai messo per finirlo?');
$cm6->setAuthor($vasa);
$cm6->setCreation($c17);
$pm->save($cm6);

// (7) vasa → c15
$cm7 = new EComment('Ne ho fatto uno simile tempo fa, ma il tuo punto è più regolare del mio!');
$cm7->setAuthor($vasa);
$cm7->setCreation($c15);
$pm->save($cm7);

// (8) vasa → c12
$cm8 = new EComment('Adorabile, mi ha messo voglia di riprendere l’uncinetto!');
$cm8->setAuthor($vasa);
$cm8->setCreation($c12);
$pm->save($cm8);

// (9) vasa → c7
$cm9 = new EComment('Ottima idea per un regalo handmade, me lo segno!');
$cm9->setAuthor($vasa);
$cm9->setCreation($c7);
$pm->save($cm9);

// (10) vasa → c2
$cm10 = new EComment('Ottima idea per un regalo handmade, me lo segno!');
$cm10->setAuthor($vasa);
$cm10->setCreation($c2);
$pm->save($cm10);

// (11) gaia → c11
$cm11 = new EComment('Ottima idea per un regalo handmade, me lo segno!');
$cm11->setAuthor($gaia);
$cm11->setCreation($c11);
$pm->save($cm11);

// (12) gaia → c4
$cm12 = new EComment('Adorabile, mi ha messo voglia di riprendere l’uncinetto!');
$cm12->setAuthor($gaia);
$cm12->setCreation($c4);
$pm->save($cm12);

// (13) gaia → c3
$cm13 = new EComment('Adorabile, mi ha messo voglia di riprendere l’uncinetto!');
$cm13->setAuthor($gaia);
$cm13->setCreation($c3);
$pm->save($cm13);

// (14) vasa → c16
$cm14 = new EComment('Molto carino! Mi piacciono soprattutto i colori che hai scelto');
$cm14->setAuthor($vasa);
$cm14->setCreation($c16);
$pm->save($cm14);

// (15) gloria → c3
$cm15 = new EComment('Continua così, si vede che stai migliorando progetto dopo progetto.');
$cm15->setAuthor($gloria);
$cm15->setCreation($c3);
$pm->save($cm15);

// (16) gloria → c10
$cm16 = new EComment('Il punto è venuto molto regolare, che uncinetto hai usato?');
$cm16->setAuthor($gloria);
$cm16->setCreation($c10);
$pm->save($cm16);

// (17) gloria → c9
$cm17 = new EComment('La combinazione di colori è azzeccatissima.');
$cm17->setAuthor($gloria);
$cm17->setCreation($c9);
$pm->save($cm17);

// (18) gloria → c17
$cm18 = new EComment('Ci ho messo soltanto 2 ore!');
$cm18->setAuthor($gloria);
$cm18->setCreation($c17);
$pm->save($cm18);

// (19) gloria → c8
$cm19 = new EComment('Sembra un progetto lungo, quanto tempo ci hai dedicato?');
$cm19->setAuthor($gloria);
$cm19->setCreation($c8);
$pm->save($cm19);

// (20) luca → c17
$cm20 = new EComment('È adatto anche a chi è alle prime armi?');
$cm20->setAuthor($luca);
$cm20->setCreation($c17);
$pm->save($cm20);


// ---------------- LIKES ----------------

// (2) marta → c2
$l1 = new ELike($marta, $c2);
$pm->save($l1);

// (3) gloria → c11
$l2 = new ELike($gloria, $c11);
$pm->save($l2);

// (4) gloria → c10
$l3 = new ELike($gloria, $c10);
$pm->save($l3);

// (5) gloria → c7
$l4 = new ELike($gloria, $c7);
$pm->save($l4);

// (6) gloria → c5
$l5 = new ELike($gloria, $c5);
$pm->save($l5);

// (7) marta → c17
$l6 = new ELike($marta, $c17);
$pm->save($l6);

// (8) marta → c16
$l7 = new ELike($marta, $c16);
$pm->save($l7);

// (9) marta → c9
$l8 = new ELike($marta, $c9);
$pm->save($l8);

// (10) marta → c15
$l9 = new ELike($marta, $c15);
$pm->save($l9);

// (11) vasa → c17
$l10 = new ELike($vasa, $c17);
$pm->save($l10);

// (12) vasa → c15
$l11 = new ELike($vasa, $c15);
$pm->save($l11);

// (13) vasa → c12
$l12 = new ELike($vasa, $c12);
$pm->save($l12);

// (14) vasa → c7
$l13 = new ELike($vasa, $c7);
$pm->save($l13);


// (16) vasa → c2
$l15 = new ELike($vasa, $c2);
$pm->save($l15);

// (17) vasa → c1
$l16 = new ELike($vasa, $c1);
$pm->save($l16);

// (18) gaia → c11
$l17 = new ELike($gaia, $c11);
$pm->save($l17);

// (19) gaia → c13
$l18 = new ELike($gaia, $c13);
$pm->save($l18);

// (20) gaia → c4
$l19 = new ELike($gaia, $c4);
$pm->save($l19);

// (21) gaia → c3
$l20 = new ELike($gaia, $c3);
$pm->save($l20);

// (22) vasa → c5
$l21 = new ELike($vasa, $c5);
$pm->save($l21);

// (23) vasa → c16
$l22 = new ELike($vasa, $c16);
$pm->save($l22);

// (24) gloria → c17
$l23 = new ELike($gloria, $c17);
$pm->save($l23);

// (25) gloria → c3
$l24 = new ELike($gloria, $c3);
$pm->save($l24);

// (26) gloria → c9
$l25 = new ELike($gloria, $c9);
$pm->save($l25);

// (27) gloria → c8
$l26 = new ELike($gloria, $c8);
$pm->save($l26);


// (29) luca → c17
$l28 = new ELike($luca, $c17);
$pm->save($l28);

// (30) luca → c11
$l29 = new ELike($luca, $c11);
$pm->save($l29);

// (31) luca → c8
$l30 = new ELike($luca, $c8);
$pm->save($l30);

// (32) luca → c1
$l31 = new ELike($luca, $c1);
$pm->save($l31);


// ---------------- FOLLOWS ----------------

// gloria segue marta
$gloria->follow($marta);

// gloria segue gaia
$gloria->follow($gaia);

// gloria segue vasa
$gloria->follow($vasa);

// basta un flush finale
$pm->save($gloria);


// ---------------- SAVED CREATIONS ----------------

// marta
$marta->addSavedCreation($c2);
$marta->addSavedCreation($c9);
$marta->addSavedCreation($c15);
$marta->addSavedCreation($c17);

// gloria
$gloria->addSavedCreation($c3);
$gloria->addSavedCreation($c5);
$gloria->addSavedCreation($c7);
$gloria->addSavedCreation($c8);
$gloria->addSavedCreation($c10);
$gloria->addSavedCreation($c11);

// gaia
$gaia->addSavedCreation($c11);
$gaia->addSavedCreation($c13);

// vasa
$vasa->addSavedCreation($c2);
$vasa->addSavedCreation($c7);
$vasa->addSavedCreation($c12);
$vasa->addSavedCreation($c17);


// basta persistere gli utenti
$pm->save($marta);
$pm->save($gloria);
$pm->save($gaia);
$pm->save($vasa);
$pm->save($luca);

echo "Seed completato con successo.\n";