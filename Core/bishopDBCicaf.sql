-- --------------------------------------------------------
-- Hôte:                         127.0.0.1
-- Version du serveur:           10.6.4-MariaDB - mariadb.org binary distribution
-- SE du serveur:                Win64
-- HeidiSQL Version:             11.3.0.6295
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Listage des données de la table cicafdb.agent : ~0 rows (environ)
/*!40000 ALTER TABLE `agent` DISABLE KEYS */;
/*!40000 ALTER TABLE `agent` ENABLE KEYS */;

-- Listage des données de la table cicafdb.balancecloture : ~0 rows (environ)
/*!40000 ALTER TABLE `balancecloture` DISABLE KEYS */;
/*!40000 ALTER TABLE `balancecloture` ENABLE KEYS */;

-- Listage des données de la table cicafdb.budget : ~0 rows (environ)
/*!40000 ALTER TABLE `budget` DISABLE KEYS */;
/*!40000 ALTER TABLE `budget` ENABLE KEYS */;

-- Listage des données de la table cicafdb.categoriejournaux : ~5 rows (environ)
/*!40000 ALTER TABLE `categoriejournaux` DISABLE KEYS */;
INSERT IGNORE INTO `categoriejournaux` (`idCategorieJournaux`, `CodeJournal`, `NomJournal`) VALUES
	(1, 'A', 'Caisse'),
	(2, 'B', 'Banque'),
	(3, 'C', 'Fournisseur'),
	(4, 'D', 'Client'),
	(5, 'E', 'Operations diverses');
/*!40000 ALTER TABLE `categoriejournaux` ENABLE KEYS */;

-- Listage des données de la table cicafdb.classe : ~7 rows (environ)
/*!40000 ALTER TABLE `classe` DISABLE KEYS */;
INSERT IGNORE INTO `classe` (`idClasse`, `CodeClasse`, `Designation`) VALUES
	(1, 1, 'Comptes des ressources durables'),
	(2, 2, 'Immobilisations'),
	(3, 3, 'Stocks'),
	(4, 4, 'Tiers'),
	(5, 5, 'Tresorerie'),
	(6, 6, 'Charges'),
	(7, 7, 'Produits');
/*!40000 ALTER TABLE `classe` ENABLE KEYS */;

-- Listage des données de la table cicafdb.codeprojet : ~0 rows (environ)
/*!40000 ALTER TABLE `codeprojet` DISABLE KEYS */;
/*!40000 ALTER TABLE `codeprojet` ENABLE KEYS */;

-- Listage des données de la table cicafdb.commune : ~5 rows (environ)
/*!40000 ALTER TABLE `commune` DISABLE KEYS */;
INSERT IGNORE INTO `commune` (`idCommune`, `commune`, `ProvinceId`) VALUES
	(1, 'Gombe', 1),
	(2, 'Kinshasa', 1),
	(3, 'Lingwala', 1),
	(4, 'Kamalondo', 2),
	(5, 'Barumbu', 1);
/*!40000 ALTER TABLE `commune` ENABLE KEYS */;

-- Listage des données de la table cicafdb.compteanalityque : ~3 rows (environ)
/*!40000 ALTER TABLE `compteanalityque` DISABLE KEYS */;
INSERT IGNORE INTO `compteanalityque` (`idCompteAnalityque`, `DesiAnal`, `DateAnal`) VALUES
	(1, 'Creation du logiciel web', '2021-05-03 10:00:01'),
	(2, 'Achat de chaise', '2021-05-15 10:00:01'),
	(3, 'Achat computer', '2021-07-07 18:00:01');
/*!40000 ALTER TABLE `compteanalityque` ENABLE KEYS */;

-- Listage des données de la table cicafdb.compteanalytique : ~2 rows (environ)
/*!40000 ALTER TABLE `compteanalytique` DISABLE KEYS */;
INSERT IGNORE INTO `compteanalytique` (`idCompteAnalytique`, `DesiAnal`, `DateAnal`) VALUES
	(1, 'Creation de logicciel', '2021-05-03 10:00:01'),
	(2, 'Achat maison', '2021-05-06 20:00:01');
/*!40000 ALTER TABLE `compteanalytique` ENABLE KEYS */;

-- Listage des données de la table cicafdb.comptedivisionnaire : ~2 rows (environ)
/*!40000 ALTER TABLE `comptedivisionnaire` DISABLE KEYS */;
INSERT IGNORE INTO `comptedivisionnaire` (`idCompteDivisionnaire`, `CodeCompteDivisionnaire`, `DesigantionCD`, `SousCompte_idSousCompte`) VALUES
	(1, '1383', 'Resultat de Scission', 1),
	(2, '6011', 'Achat dans la region', 22);
/*!40000 ALTER TABLE `comptedivisionnaire` ENABLE KEYS */;

-- Listage des données de la table cicafdb.comptefamille : ~2 rows (environ)
/*!40000 ALTER TABLE `comptefamille` DISABLE KEYS */;
INSERT IGNORE INTO `comptefamille` (`idCompteFamille`, `CodeCompteFamille`, `DesigantionCompteFamille`, `CompteDivisionnaire_idCompteDivisionnaire`) VALUES
	(1, '138300', 'Resultat de Scission', 1),
	(2, '60110', 'Achat dans la region', 2);
/*!40000 ALTER TABLE `comptefamille` ENABLE KEYS */;

-- Listage des données de la table cicafdb.compteprincipal : ~12 rows (environ)
/*!40000 ALTER TABLE `compteprincipal` DISABLE KEYS */;
INSERT IGNORE INTO `compteprincipal` (`idComptePrincipal`, `CodeComptePrincipal`, `DesignationCompte`, `Classe_idClasse`) VALUES
	(1, '13', 'Résultat net de l\'exercice', 1),
	(2, '20', 'Charges immobiliés', 2),
	(3, '21', 'Immobilisations Incorporelles', 2),
	(4, '22', 'Terrains', 2),
	(5, '23', 'Bâtiments, Installations, Techniques', 2),
	(6, '24', 'Matériels', 2),
	(7, '25', 'Avances, Accomptes sur Immobilisations', 2),
	(8, '26', 'Titres de participations', 2),
	(9, '27', 'Autres immobilisations financières', 2),
	(10, '28', 'Amortissements', 2),
	(11, '29', 'Provisions pour depréciations', 2),
	(12, '60', 'Achat et variation de stock', 6);
/*!40000 ALTER TABLE `compteprincipal` ENABLE KEYS */;

-- Listage des données de la table cicafdb.corpbalance : ~0 rows (environ)
/*!40000 ALTER TABLE `corpbalance` DISABLE KEYS */;
/*!40000 ALTER TABLE `corpbalance` ENABLE KEYS */;

-- Listage des données de la table cicafdb.corpbilannormalise : ~0 rows (environ)
/*!40000 ALTER TABLE `corpbilannormalise` DISABLE KEYS */;
/*!40000 ALTER TABLE `corpbilannormalise` ENABLE KEYS */;

-- Listage des données de la table cicafdb.corpbudget : ~0 rows (environ)
/*!40000 ALTER TABLE `corpbudget` DISABLE KEYS */;
/*!40000 ALTER TABLE `corpbudget` ENABLE KEYS */;

-- Listage des données de la table cicafdb.corpbudget_has_budget : ~0 rows (environ)
/*!40000 ALTER TABLE `corpbudget_has_budget` DISABLE KEYS */;
/*!40000 ALTER TABLE `corpbudget_has_budget` ENABLE KEYS */;

-- Listage des données de la table cicafdb.corpbulletin : ~0 rows (environ)
/*!40000 ALTER TABLE `corpbulletin` DISABLE KEYS */;
/*!40000 ALTER TABLE `corpbulletin` ENABLE KEYS */;

-- Listage des données de la table cicafdb.corpmouv : ~18 rows (environ)
/*!40000 ALTER TABLE `corpmouv` DISABLE KEYS */;
INSERT IGNORE INTO `corpmouv` (`idCorpMouv`, `NumMouv`, `T6_CodeAnal`, `Imputation`, `Libelle`, `DMontant`, `CMontant`, `DCompte`, `CCompte`, `SCompte`, `CDivisionnaire`, `Transit`, `DSolde`, `MC1320`, `MBM1322`, `VA133`, `EBE134`, `RE135`, `T8_RF136`, `RAO137`, `RHAO138`, `RNAIB139`, `Impot89`, `RNADI131`, `DBilan`, `CBilan`, `RefPiece`, `PlanComptable_idPlanComptable`) VALUES
	(9, NULL, '3', 'D', 'FGGFG', 2000.00, NULL, '611000000', NULL, '611', '6110', 2000.00, 2000.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'DFGDFG', 3),
	(10, NULL, '3', 'D', 'DFVDFV', 2000.00, NULL, '611000000', NULL, '611', '6110', 2000.00, 2000.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'DFVDFV', 3),
	(11, NULL, '3', 'D', NULL, 2000.00, NULL, '611000000', NULL, '611', '6110', 2000.00, 2000.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3),
	(12, NULL, '3', 'D', NULL, 2000.00, NULL, '611000000 ', NULL, '611', '6110', 2000.00, 2000.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3),
	(13, NULL, '3', 'D', NULL, 2000.00, NULL, '611000000 ', NULL, '611', '6110', 2000.00, 2000.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3),
	(14, NULL, '3', 'C', NULL, NULL, 2000.00, NULL, '445400000 ', '445', '4454', 2000.00, -2000.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 4),
	(15, 21, '3', 'D', NULL, 2000.00, NULL, '611000000', NULL, '611', '6110', 2000.00, 2000.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3),
	(16, 21, '3', 'C', NULL, NULL, 2000.00, NULL, '445400000', '445', '4454', 2000.00, -2000.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 4),
	(17, 22, '3', 'D', 'RTGRTG', 5000.00, NULL, '611000000', NULL, '611', '6110', 5000.00, 5000.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'RTGRGT', 3),
	(18, 22, '3', 'C', 'RTGRTG', NULL, 5000.00, NULL, '445400000', '445', '4454', 5000.00, -5000.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'RTGRGGRT', 4),
	(19, 23, '3', 'D', NULL, 54000.00, NULL, '611000000', NULL, '611', '6110', 54000.00, 54000.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3),
	(20, 23, '3', 'C', NULL, NULL, 54000.00, NULL, '445400000', '445', '4454', 54000.00, -54000.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 4),
	(21, 24, '3', 'D', NULL, 3000.00, NULL, '611000000', NULL, '611', '6110', 3000.00, 3000.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3),
	(22, 24, '3', 'C', NULL, NULL, 3000.00, NULL, '445400000', '445', '4454', 3000.00, -3000.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 4),
	(23, 25, '1', 'D', 'Creation de logicciel', 1000.00, NULL, '445400000', NULL, '445', '4454', 1000.00, -2000.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 4),
	(24, 25, '1', 'D', 'Creation de logicciel', 500.00, NULL, '611000000', NULL, '611', '6110', 500.00, 3500.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3),
	(25, 25, '1', 'C', 'Creation de logicciel', NULL, 1000.00, NULL, '138300000', '138', '1383', 1000.00, -1000.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1),
	(26, 25, '1', 'C', 'Creation de logicciel', NULL, 500.00, NULL, '601100000', '601', '6011', 500.00, -500.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2);
/*!40000 ALTER TABLE `corpmouv` ENABLE KEYS */;

-- Listage des données de la table cicafdb.donneecomptableimmo : ~0 rows (environ)
/*!40000 ALTER TABLE `donneecomptableimmo` DISABLE KEYS */;
/*!40000 ALTER TABLE `donneecomptableimmo` ENABLE KEYS */;

-- Listage des données de la table cicafdb.entetebilannormal : ~0 rows (environ)
/*!40000 ALTER TABLE `entetebilannormal` DISABLE KEYS */;
/*!40000 ALTER TABLE `entetebilannormal` ENABLE KEYS */;

-- Listage des données de la table cicafdb.entetebul : ~0 rows (environ)
/*!40000 ALTER TABLE `entetebul` DISABLE KEYS */;
/*!40000 ALTER TABLE `entetebul` ENABLE KEYS */;

-- Listage des données de la table cicafdb.entetemouv : ~10 rows (environ)
/*!40000 ALTER TABLE `entetemouv` DISABLE KEYS */;
INSERT IGNORE INTO `entetemouv` (`idEnteteMouv`, `DateMouv`, `DateOper`, `CodeDoc`, `NomDoc`, `NumDoc`, `Exercice`, `TauxApp`, `NomBeneficiaire`, `NomDebiteur`, `MotifGeneral`, `DMontant`, `CMontant`, `FCMontant`, `NumDoc1`, `TauxEuro`, `EntrepriseId`, `userId`, `CategorieJournaux_idCategorieJournaux`) VALUES
	(16, '2021-08-31', '2021-08-31 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 5, 1, 1),
	(17, '2021-08-31', '2021-08-31 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 5, 1, 1),
	(18, '2021-08-31', '2021-08-31 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 5, 1, 1),
	(19, '2021-08-31', '2021-08-31 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 5, 1, 1),
	(20, '2021-08-31', '2021-08-31 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 5, 1, 1),
	(21, '2021-08-31', '2021-08-31 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 5, 1, 1),
	(22, '2021-09-01', '2021-09-01 00:00:00', 'RE', 'FERVFCF', NULL, '2021', 2000.000, 'JHHHJM', 'HJMHMJHM', 'EGFGRGT', 5000.00, 5000.00, NULL, '2555', NULL, 5, 1, 1),
	(23, '2021-09-01', '2021-09-01 00:00:00', 'GHNGHN', 'GHNGHN', NULL, '2021', 400.000, 'dedwed', 'ddwdwe', NULL, 3000.00, 3000.00, NULL, '53546356', NULL, 5, 1, 1),
	(24, '2021-09-01', '2021-09-01 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'FDVDVDV', 3000.00, 3000.00, NULL, NULL, NULL, 5, 1, 1),
	(25, '2021-09-09', '2021-09-09 00:00:00', 'hfhfgh', 'gfhfghhg', NULL, '2021', 2000.000, NULL, NULL, NULL, 1500.00, 1500.00, 3000000.00, '125', NULL, 5, 1, 4);
/*!40000 ALTER TABLE `entetemouv` ENABLE KEYS */;

-- Listage des données de la table cicafdb.entreprise : ~2 rows (environ)
/*!40000 ALTER TABLE `entreprise` DISABLE KEYS */;
INSERT IGNORE INTO `entreprise` (`idEntreprise`, `SCodeEntreprise`, `SNomEntreprise`, `RespoEntreprise`, `TypeEntreprise`, `SNumRue`, `SNomRue`, `SNumTel`, `NumEmail`, `DDebutActivite`, `DDComptabilite`, `entitede`, `commune_idCommune`, `NIF`, `NbreJourTravailParSemaine`, `NbreHeureDeTravailParJour`) VALUES
	(4, '001', 'Sertek plus', 'Josue KALUBI', 'sarlu', '213b', 'Shaumba', '085 22 54 236', 'sertek@gmail.com', '2018-02-05 00:00:00', '2020-05-06 00:00:00', NULL, 1, NULL, 5, 8),
	(5, '251', 'Sertek-kin', 'Richard van', 'sarlu', '213b', 'ethip', '085 58 69 236', 'seffgrtek@gmail.com', '2018-02-05 00:00:00', '2020-05-06 00:00:00', 4, 2, NULL, 5, 8);
/*!40000 ALTER TABLE `entreprise` ENABLE KEYS */;

-- Listage des données de la table cicafdb.exercicecomptable : ~0 rows (environ)
/*!40000 ALTER TABLE `exercicecomptable` DISABLE KEYS */;
/*!40000 ALTER TABLE `exercicecomptable` ENABLE KEYS */;

-- Listage des données de la table cicafdb.fonction : ~2 rows (environ)
/*!40000 ALTER TABLE `fonction` DISABLE KEYS */;
INSERT IGNORE INTO `fonction` (`idFonction`, `Fonction`) VALUES
	(1, 'Directeur Général'),
	(2, 'Comptable'),
	(3, 'DRH');
/*!40000 ALTER TABLE `fonction` ENABLE KEYS */;

-- Listage des données de la table cicafdb.listecodesystemenormal : ~0 rows (environ)
/*!40000 ALTER TABLE `listecodesystemenormal` DISABLE KEYS */;
/*!40000 ALTER TABLE `listecodesystemenormal` ENABLE KEYS */;

-- Listage des données de la table cicafdb.logs : ~0 rows (environ)
/*!40000 ALTER TABLE `logs` DISABLE KEYS */;
/*!40000 ALTER TABLE `logs` ENABLE KEYS */;

-- Listage des données de la table cicafdb.massebilantaire : ~0 rows (environ)
/*!40000 ALTER TABLE `massebilantaire` DISABLE KEYS */;
/*!40000 ALTER TABLE `massebilantaire` ENABLE KEYS */;

-- Listage des données de la table cicafdb.pays : ~0 rows (environ)
/*!40000 ALTER TABLE `pays` DISABLE KEYS */;
INSERT IGNORE INTO `pays` (`idPays`, `pays`) VALUES
	(1, 'République Démocratique Du Congo');
/*!40000 ALTER TABLE `pays` ENABLE KEYS */;

-- Listage des données de la table cicafdb.planamortnormal : ~0 rows (environ)
/*!40000 ALTER TABLE `planamortnormal` DISABLE KEYS */;
/*!40000 ALTER TABLE `planamortnormal` ENABLE KEYS */;

-- Listage des données de la table cicafdb.plancomptable : ~5 rows (environ)
/*!40000 ALTER TABLE `plancomptable` DISABLE KEYS */;
INSERT IGNORE INTO `plancomptable` (`idPlanComptable`, `NumCompte`, `Numclasse`, `CompteOperation`, `DesiOperation`, `DesiClassel`, `ComptePrinci`, `DesiComptePrinci`, `SousCompte`, `DesiSousCompte`, `CodeDivision`, `CodeFamille`, `DesiFamille`, `RefCompte`, `Lettrage1`, `Lettrage2`, `Lettrage3`, `Lettrage4`, `DesiDivision`, `debit`, `credit`, `typeCompte`) VALUES
	(1, 138300000, '1', '138300000', 'Resultat de Scission', 'Comptes des ressources durables', '13', 'Resultat net de l\'exercice', '138', 'Resultat hors activite', '1383', '138300', 'Resultat de Scission', NULL, 'UQD2', NULL, NULL, NULL, 'Resultat de Scission', 0.00, 1000.00, 1),
	(2, 601100000, '6', '601100000', 'Achat des marchandises test', 'Comptes des charges des activités ordinaire', '60', 'Achat et variation du stock', '601', 'Achat de marchandises', '6011', '601100', 'Achat dans la region', '60110', 'cadf4', 'cadf4', 'cadf4', 'cadf4', 'Achat dans la region', 0.00, 500.00, 1),
	(3, 611000000, '6', '611000000', 'Transport marchandises test', 'Charges des activites ordinaires', '61', 'Transports', '611', 'Transport sur achat', '6110', '611000', 'Transport sur achat', '61100', 'ddfff', 'ffff', 'ffff', 'sdsd', 'Transport sur achat', 3500.00, 0.00, 1),
	(4, 445400000, '4', '445400000', 'Taxes sur services exterieurs et autres charges', 'Tiers', '44', 'Etats et collectivités publiques', '445', 'Etats, TVA Recupérables', '4454', '445400', 'Etats, TVA Recupérables', 'fvvfvf', 'svvv', 'ssvsv', 'svsvvs', 'ssvsdv', 'Etats, TVA Recupérables', 1000.00, 3000.00, 1),
	(5, 401100000, '4', '401100000', 'Fournisseur produit test', 'Tiers', '40', 'Fournisseur et compte Rattachés', '401', 'Fournisseurs, dettes en comptes', '4011', '401100', 'Fournisseurs', 'dfdfd', 'zfzfzfzf', 'zffzf', 'zfzfzf', 'zfff', 'Fournisseurs', 0.00, 0.00, 1);
/*!40000 ALTER TABLE `plancomptable` ENABLE KEYS */;

-- Listage des données de la table cicafdb.province : ~2 rows (environ)
/*!40000 ALTER TABLE `province` DISABLE KEYS */;
INSERT IGNORE INTO `province` (`idProvince`, `province`, `paysId`) VALUES
	(1, 'Kinshasa', 1),
	(2, 'Lubumbashi', 1);
/*!40000 ALTER TABLE `province` ENABLE KEYS */;

-- Listage des données de la table cicafdb.renseignementimmo : ~2 rows (environ)
/*!40000 ALTER TABLE `renseignementimmo` DISABLE KEYS */;
INSERT IGNORE INTO `renseignementimmo` (`idRenseignementImmo`, `DesignationImmo`, `DateAcquisition`, `CodeImmo`, `Compte24`, `Compte28`, `Compte68`, `TauxAmortissement`, `DureeImmo`, `ValeurBrute`, `LieuAffectation`, `TauxChangeIitial`, `EcartDeReev_14_106`, `QteInitiale`, `QteInvantaire`, `TauxReevaluationV`, `ExerciceTauxRev`) VALUES
	(1, 'chaise bureau', '2021-09-28', 'CHB001', 240000001, 280000001, 680000001, 0.08, 12, 240000.00, 'Matete', 2000.00, '140000001', 1, 1, NULL, NULL),
	(2, 'Table', '2021-09-28', 'TBL001', 240000001, 280000001, 680000001, 0.08, 12, 240000.00, 'Matete', 2000.00, '140000001', 1, 1, NULL, NULL);
/*!40000 ALTER TABLE `renseignementimmo` ENABLE KEYS */;

-- Listage des données de la table cicafdb.rubrique : ~0 rows (environ)
/*!40000 ALTER TABLE `rubrique` DISABLE KEYS */;
/*!40000 ALTER TABLE `rubrique` ENABLE KEYS */;

-- Listage des données de la table cicafdb.service : ~2 rows (environ)
/*!40000 ALTER TABLE `service` DISABLE KEYS */;
INSERT IGNORE INTO `service` (`idService`, `codeService`, `Service`) VALUES
	(1, NULL, 'informatique'),
	(2, NULL, 'comptabilite'),
	(3, NULL, 'logistique');
/*!40000 ALTER TABLE `service` ENABLE KEYS */;

-- Listage des données de la table cicafdb.souscompte : ~22 rows (environ)
/*!40000 ALTER TABLE `souscompte` DISABLE KEYS */;
INSERT IGNORE INTO `souscompte` (`idSousCompte`, `CodeSousCompte`, `Designation`, `ComptePrincipal_idComptePrincipal`) VALUES
	(1, '138', 'Resultat hors activite ordinaire', 1),
	(2, '201', 'Frais d\'établissement', 2),
	(3, '202', 'Charges à repartir', 2),
	(4, '206', 'Primes Remboursements Obligations', 2),
	(5, '211', 'Frais de recherches et développement', 3),
	(6, '212', 'Brevets, Liceneces, Concessions', 3),
	(7, '213', 'Logiciels', 3),
	(8, '214', 'Marques', 3),
	(9, '215', 'Fonds Commercial', 3),
	(10, '216', 'Droits au bail', 3),
	(11, '217', 'Investissements de créations', 3),
	(12, '218', 'Autres droits, valeurs incorporelles', 3),
	(13, '219', 'Immobilisations incorporelles en cours', 3),
	(14, '221', 'Terrains agricole et forestiers', 4),
	(15, '222', 'Terrains nu', 4),
	(16, '223', 'Terrains bâtis', 4),
	(17, '224', 'Traveaux de mise en valeur', 4),
	(18, '225', 'Terrains de gisement', 4),
	(19, '226', 'Terrains aménagé', 4),
	(20, '228', 'Autres terrains', 4),
	(21, '229', 'Aménagement terrains en cours', 4),
	(22, '601', 'Achats de marchandise', 12);
/*!40000 ALTER TABLE `souscompte` ENABLE KEYS */;

-- Listage des données de la table cicafdb.suiviimmo : ~0 rows (environ)
/*!40000 ALTER TABLE `suiviimmo` DISABLE KEYS */;
/*!40000 ALTER TABLE `suiviimmo` ENABLE KEYS */;

-- Listage des données de la table cicafdb.taux : ~0 rows (environ)
/*!40000 ALTER TABLE `taux` DISABLE KEYS */;
/*!40000 ALTER TABLE `taux` ENABLE KEYS */;

-- Listage des données de la table cicafdb.user : ~4 rows (environ)
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT IGNORE INTO `user` (`idUser`, `nom`, `role`, `login`, `mpd`, `specialCode`) VALUES
	(1, 'sertek', 'admin', 'sam', '4e19302af21c1b0ec7a3d1f151ac4b2a9ed4b986', NULL),
	(2, 'Samuel Wabwana', 'comptable', 'sam001', '91bc92adee53c6ac0725689bc879506ebb415734', '001'),
	(3, 'Josue Kalubi', 'comptable', 'jos002', 'c8a98a14afd4623328ed7b570e66ced088222578', '002'),
	(4, 'Amedee', 'Amortisseur', 'ame003', '929d4b9dcc22eaa58c8e7d9895b5ac0e901a220c', '003'),
	(5, 'regine', 'biens', 'regine1402', '929d4b9dcc22eaa58c8e7d9895b5ac0e901a220c', '');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;

-- Listage des données de la table cicafdb.userjournal : ~0 rows (environ)
/*!40000 ALTER TABLE `userjournal` DISABLE KEYS */;
/*!40000 ALTER TABLE `userjournal` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
