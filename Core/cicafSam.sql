-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Sep 23, 2021 at 12:43 PM
-- Server version: 5.7.31
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cicafdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `agent`
--

DROP TABLE IF EXISTS `agent`;
CREATE TABLE IF NOT EXISTS `agent` (
  `idAgent` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `EntrepriseId` int(10) UNSIGNED NOT NULL,
  `MatriAgent` varchar(45) DEFAULT NULL,
  `NomAgent` varchar(45) DEFAULT NULL,
  `PostNomAgent` varchar(45) DEFAULT NULL,
  `Prenom` varchar(45) DEFAULT NULL,
  `SexeAgent` enum('F','M') DEFAULT NULL,
  `DateEmbauche` date DEFAULT NULL,
  `DateEmbaucheRel` date DEFAULT NULL,
  `EtatCivil` enum('Marie','celibataire','divorce','veuf') DEFAULT NULL,
  `NomEpouse` varchar(45) DEFAULT NULL,
  `NbreEnfant` smallint(5) UNSIGNED DEFAULT NULL,
  `Nationalite` varchar(45) DEFAULT NULL,
  `NumRue` varchar(25) DEFAULT NULL,
  `NomRue` varchar(45) DEFAULT NULL,
  `CoeffHS2` int(11) DEFAULT NULL,
  `NumTel` varchar(45) DEFAULT NULL,
  `TauxAlloc` decimal(15,3) DEFAULT NULL,
  `AllocExtra` decimal(15,3) DEFAULT NULL,
  `CoeffHS1` decimal(15,5) DEFAULT NULL,
  `CoeffHF` decimal(15,5) DEFAULT NULL,
  `Logement` decimal(15,2) DEFAULT NULL,
  `Transport` decimal(15,2) DEFAULT NULL,
  `DivIndem` decimal(15,2) DEFAULT NULL,
  `NumINSS` varchar(45) DEFAULT NULL,
  `TauxINSS` decimal(10,4) DEFAULT NULL,
  `TauxImpot` decimal(10,4) DEFAULT NULL,
  `TauxTPJ` decimal(10,4) DEFAULT NULL,
  `Categorie` varchar(45) DEFAULT NULL,
  `Bareme` decimal(15,4) DEFAULT NULL,
  `CompteBancaire` varchar(45) DEFAULT NULL,
  `DateSortie` datetime DEFAULT NULL,
  `Tension` decimal(15,2) DEFAULT NULL,
  `BaseTension` decimal(15,2) DEFAULT NULL,
  `SortieAgent` varchar(3) DEFAULT NULL,
  `TauxIER` decimal(15,4) DEFAULT NULL,
  `communeId` int(11) DEFAULT NULL,
  `FonctionId` int(11) DEFAULT NULL,
  `ServiceId` int(11) DEFAULT NULL,
  `user_idUser` int(11) DEFAULT NULL,
  PRIMARY KEY (`idAgent`),
  KEY `fk_Agent_commune1_idx` (`communeId`),
  KEY `fk_Agent_Fonction1_idx` (`FonctionId`),
  KEY `fk_Agent_Service1_idx` (`ServiceId`),
  KEY `fk_Agent_user1_idx` (`user_idUser`),
  KEY `FK_agent_entreprise` (`EntrepriseId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `balancecloture`
--

DROP TABLE IF EXISTS `balancecloture`;
CREATE TABLE IF NOT EXISTS `balancecloture` (
  `idBalanceCloture` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `DateBalance` timestamp NULL DEFAULT NULL,
  `ExerciceBalance` decimal(15,2) DEFAULT NULL,
  `EntrepriseId` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`idBalanceCloture`),
  KEY `fk_BalanceCloture_Entreprise1_idx` (`EntrepriseId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `budget`
--

DROP TABLE IF EXISTS `budget`;
CREATE TABLE IF NOT EXISTS `budget` (
  `idBudget` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `ExerciceBudget` varchar(45) NOT NULL,
  `DateOuverture` date DEFAULT NULL,
  `DateCloture` date DEFAULT NULL,
  `Janvier` decimal(15,2) DEFAULT NULL,
  `Fevrier` decimal(15,2) DEFAULT NULL,
  `Mars` decimal(15,2) DEFAULT NULL,
  `Avril` decimal(15,2) DEFAULT NULL,
  `Mai` decimal(15,2) DEFAULT NULL,
  `Juin` decimal(15,2) DEFAULT NULL,
  `Juillet` decimal(15,2) DEFAULT NULL,
  `Aout` decimal(15,2) DEFAULT NULL,
  `Septembre` decimal(15,2) DEFAULT NULL,
  `Octobre` decimal(15,2) DEFAULT NULL,
  `Novembre` decimal(15,2) DEFAULT NULL,
  `Decembre` decimal(15,2) DEFAULT NULL,
  `TotalPlaning` decimal(15,2) DEFAULT NULL,
  `CodeProjetId` int(10) UNSIGNED NOT NULL,
  `EntrepriseId` int(10) UNSIGNED NOT NULL,
  `CompteAnalityqueId` int(10) UNSIGNED NOT NULL,
  `PlanComptableId` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  PRIMARY KEY (`idBudget`),
  KEY `fk_T10_Budget_CodeProjet1_idx` (`CodeProjetId`),
  KEY `fk_Budget_Entreprise1_idx` (`EntrepriseId`),
  KEY `fk_Budget_CompteAnalityque1_idx` (`CompteAnalityqueId`),
  KEY `fk_Budget_PlanComptable1_idx` (`PlanComptableId`),
  KEY `fk_Budget_user1_idx` (`userId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `categoriejournaux`
--

DROP TABLE IF EXISTS `categoriejournaux`;
CREATE TABLE IF NOT EXISTS `categoriejournaux` (
  `idCategorieJournaux` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `CodeJournal` varchar(45) DEFAULT NULL,
  `NomJournal` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idCategorieJournaux`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categoriejournaux`
--

INSERT INTO `categoriejournaux` (`idCategorieJournaux`, `CodeJournal`, `NomJournal`) VALUES
(1, 'A', 'Caisse'),
(2, 'B', 'Banque'),
(3, 'C', 'Fournisseur'),
(4, 'D', 'Client'),
(5, 'E', 'Operations diverses');

-- --------------------------------------------------------

--
-- Table structure for table `classe`
--

DROP TABLE IF EXISTS `classe`;
CREATE TABLE IF NOT EXISTS `classe` (
  `idClasse` int(11) NOT NULL AUTO_INCREMENT,
  `CodeClasse` smallint(6) DEFAULT NULL,
  `Designation` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idClasse`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `classe`
--

INSERT INTO `classe` (`idClasse`, `CodeClasse`, `Designation`) VALUES
(1, 1, 'Comptes des ressources durables'),
(2, 2, 'Immobilisations'),
(3, 3, 'Stocks'),
(4, 4, 'Tiers'),
(5, 5, 'Tresorerie'),
(6, 6, 'Charges'),
(7, 7, 'Produits');

-- --------------------------------------------------------

--
-- Table structure for table `codeprojet`
--

DROP TABLE IF EXISTS `codeprojet`;
CREATE TABLE IF NOT EXISTS `codeprojet` (
  `idCodeProjet` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `DateDebutProjet` date DEFAULT NULL,
  `DateFinProjet` date DEFAULT NULL,
  `NomBailleur` varchar(45) DEFAULT NULL,
  `NomResponsable` varchar(45) DEFAULT NULL,
  `PersonneCible` varchar(45) DEFAULT NULL,
  `NomProjet` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idCodeProjet`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `commune`
--

DROP TABLE IF EXISTS `commune`;
CREATE TABLE IF NOT EXISTS `commune` (
  `idCommune` int(11) NOT NULL AUTO_INCREMENT,
  `commune` varchar(45) DEFAULT NULL,
  `ProvinceId` int(11) NOT NULL,
  PRIMARY KEY (`idCommune`),
  KEY `fk_commune_Province_idx` (`ProvinceId`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `commune`
--

INSERT INTO `commune` (`idCommune`, `commune`, `ProvinceId`) VALUES
(1, 'Gombe', 1),
(2, 'Kinshasa', 1),
(3, 'Lingwala', 1),
(4, 'Kamalondo', 2),
(5, 'Barumbu', 1);

-- --------------------------------------------------------

--
-- Table structure for table `compteanalityque`
--

DROP TABLE IF EXISTS `compteanalityque`;
CREATE TABLE IF NOT EXISTS `compteanalityque` (
  `idCompteAnalityque` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `DesiAnal` varchar(45) DEFAULT NULL,
  `DateAnal` datetime DEFAULT NULL,
  PRIMARY KEY (`idCompteAnalityque`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `compteanalityque`
--

INSERT INTO `compteanalityque` (`idCompteAnalityque`, `DesiAnal`, `DateAnal`) VALUES
(1, 'Creation du logiciel web', '2021-05-03 10:00:01'),
(2, 'Achat de chaise', '2021-05-15 10:00:01'),
(3, 'Achat computer', '2021-07-07 18:00:01');

-- --------------------------------------------------------

--
-- Table structure for table `compteanalytique`
--

DROP TABLE IF EXISTS `compteanalytique`;
CREATE TABLE IF NOT EXISTS `compteanalytique` (
  `idCompteAnalytique` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `DesiAnal` varchar(45) DEFAULT NULL,
  `DateAnal` datetime DEFAULT NULL,
  PRIMARY KEY (`idCompteAnalytique`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `compteanalytique`
--

INSERT INTO `compteanalytique` (`idCompteAnalytique`, `DesiAnal`, `DateAnal`) VALUES
(1, 'Creation de logicciel', '2021-05-03 10:00:01'),
(2, 'Achat maison', '2021-05-06 20:00:01');

-- --------------------------------------------------------

--
-- Table structure for table `comptedivisionnaire`
--

DROP TABLE IF EXISTS `comptedivisionnaire`;
CREATE TABLE IF NOT EXISTS `comptedivisionnaire` (
  `idCompteDivisionnaire` int(11) NOT NULL AUTO_INCREMENT,
  `CodeCompteDivisionnaire` varchar(45) DEFAULT NULL,
  `DesigantionCD` varchar(45) DEFAULT NULL,
  `SousCompte_idSousCompte` int(11) NOT NULL,
  PRIMARY KEY (`idCompteDivisionnaire`),
  KEY `fk_CompteDivisionnaire_SousCompte1_idx` (`SousCompte_idSousCompte`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `comptedivisionnaire`
--

INSERT INTO `comptedivisionnaire` (`idCompteDivisionnaire`, `CodeCompteDivisionnaire`, `DesigantionCD`, `SousCompte_idSousCompte`) VALUES
(1, '1383', 'Resultat de Scission', 1),
(2, '6011', 'Achat dans la region', 22);

-- --------------------------------------------------------

--
-- Table structure for table `comptefamille`
--

DROP TABLE IF EXISTS `comptefamille`;
CREATE TABLE IF NOT EXISTS `comptefamille` (
  `idCompteFamille` int(11) NOT NULL AUTO_INCREMENT,
  `CodeCompteFamille` varchar(45) DEFAULT NULL,
  `DesigantionCompteFamille` varchar(45) DEFAULT NULL,
  `CompteDivisionnaire_idCompteDivisionnaire` int(11) NOT NULL,
  PRIMARY KEY (`idCompteFamille`),
  KEY `fk_CompteFamille_CompteDivisionnaire1_idx` (`CompteDivisionnaire_idCompteDivisionnaire`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `comptefamille`
--

INSERT INTO `comptefamille` (`idCompteFamille`, `CodeCompteFamille`, `DesigantionCompteFamille`, `CompteDivisionnaire_idCompteDivisionnaire`) VALUES
(1, '138300', 'Resultat de Scission', 1),
(2, '60110', 'Achat dans la region', 2);

-- --------------------------------------------------------

--
-- Table structure for table `compteprincipal`
--

DROP TABLE IF EXISTS `compteprincipal`;
CREATE TABLE IF NOT EXISTS `compteprincipal` (
  `idComptePrincipal` int(11) NOT NULL AUTO_INCREMENT,
  `CodeComptePrincipal` varchar(45) DEFAULT NULL,
  `DesignationCompte` varchar(45) DEFAULT NULL,
  `Classe_idClasse` int(11) NOT NULL,
  PRIMARY KEY (`idComptePrincipal`),
  KEY `fk_ComptePrincipal_Classe1_idx` (`Classe_idClasse`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `compteprincipal`
--

INSERT INTO `compteprincipal` (`idComptePrincipal`, `CodeComptePrincipal`, `DesignationCompte`, `Classe_idClasse`) VALUES
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

-- --------------------------------------------------------

--
-- Table structure for table `corpbalance`
--

DROP TABLE IF EXISTS `corpbalance`;
CREATE TABLE IF NOT EXISTS `corpbalance` (
  `idCorpBalance` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `Imput` varchar(45) DEFAULT NULL,
  `SoldePrecedent` decimal(15,2) DEFAULT NULL,
  `MouvDebit` decimal(15,2) DEFAULT NULL,
  `MouvCredit` decimal(15,2) DEFAULT NULL,
  `CumulDebit` decimal(15,2) DEFAULT NULL,
  `CumulCredit` decimal(15,2) DEFAULT NULL,
  `SoldeNouveau` decimal(15,2) DEFAULT NULL,
  `Transit` decimal(15,2) DEFAULT NULL,
  `TauxMoyen1` decimal(15,2) DEFAULT NULL,
  `TauxMoyen2` decimal(15,2) DEFAULT NULL,
  `TauxMoyen3` decimal(15,2) DEFAULT NULL,
  `TauxMoyen4` decimal(15,2) DEFAULT NULL,
  `PlanComptableId` int(11) NOT NULL,
  `BalanceClotureId` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`idCorpBalance`),
  KEY `fk_CorpBalance_PlanComptable1_idx` (`PlanComptableId`),
  KEY `fk_CorpBalance_BalanceCloture1_idx` (`BalanceClotureId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `corpbilannormalise`
--

DROP TABLE IF EXISTS `corpbilannormalise`;
CREATE TABLE IF NOT EXISTS `corpbilannormalise` (
  `idCorpBilanNormalise` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `SoldePrecedent` decimal(15,2) DEFAULT NULL,
  `MontantBrut` decimal(15,2) DEFAULT NULL,
  `AmortProvision` int(11) DEFAULT NULL,
  `MontantNet` decimal(15,2) DEFAULT NULL,
  `TauxMoyen1` decimal(10,2) DEFAULT NULL,
  `TauxMoyen2` decimal(10,2) DEFAULT NULL,
  `EnteteBilanNormalId` int(10) UNSIGNED NOT NULL,
  `ListeCodeSystemeNormalId` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`idCorpBilanNormalise`),
  KEY `fk_CorpBilanNormalise_EnteteBilanNormal1_idx` (`EnteteBilanNormalId`),
  KEY `fk_CorpBilanNormalise_ListeCodeSystemeNormal1_idx` (`ListeCodeSystemeNormalId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `corpbudget`
--

DROP TABLE IF EXISTS `corpbudget`;
CREATE TABLE IF NOT EXISTS `corpbudget` (
  `idCorpBudget` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `QtePrevue` decimal(15,2) DEFAULT NULL,
  `LibelleBudgetaire` varchar(45) DEFAULT NULL,
  `ProvisionBudgetaire` decimal(15,2) DEFAULT NULL,
  `ProvisionCumule` decimal(15,2) DEFAULT NULL,
  `Commentaires` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idCorpBudget`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `corpbudget_has_budget`
--

DROP TABLE IF EXISTS `corpbudget_has_budget`;
CREATE TABLE IF NOT EXISTS `corpbudget_has_budget` (
  `CorpBudget_idCorpBudget` int(10) UNSIGNED NOT NULL,
  `Budget_idBudget` int(10) UNSIGNED NOT NULL,
  KEY `fk_CorpBudget_has_Budget_Budget1_idx` (`Budget_idBudget`),
  KEY `fk_CorpBudget_has_Budget_CorpBudget1_idx` (`CorpBudget_idCorpBudget`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `corpbulletin`
--

DROP TABLE IF EXISTS `corpbulletin`;
CREATE TABLE IF NOT EXISTS `corpbulletin` (
  `idCorpBulletin` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `Montant1` decimal(15,2) DEFAULT NULL,
  `Avantage` decimal(15,2) DEFAULT NULL,
  `Retenue` decimal(15,2) DEFAULT NULL,
  `Remuneration` decimal(15,2) DEFAULT NULL,
  `QPPatronale` decimal(15,2) DEFAULT NULL,
  `RubriqueId` int(10) UNSIGNED NOT NULL,
  `userId` int(11) NOT NULL,
  `EnteteBulId` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`idCorpBulletin`),
  KEY `fk_CorpBulletin_Rubrique1_idx` (`RubriqueId`),
  KEY `fk_CorpBulletin_user1_idx` (`userId`),
  KEY `fk_CorpBulletin_EnteteBul1_idx` (`EnteteBulId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `corpmouv`
--

DROP TABLE IF EXISTS `corpmouv`;
CREATE TABLE IF NOT EXISTS `corpmouv` (
  `idCorpMouv` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `NumMouv` int(10) UNSIGNED DEFAULT NULL,
  `T6_CodeAnal` varchar(45) DEFAULT NULL,
  `Imputation` varchar(45) DEFAULT NULL,
  `Libelle` varchar(45) DEFAULT NULL,
  `DMontant` decimal(15,2) DEFAULT NULL,
  `CMontant` decimal(15,2) DEFAULT NULL,
  `DCompte` varchar(45) DEFAULT NULL,
  `CCompte` varchar(45) DEFAULT NULL,
  `SCompte` varchar(45) DEFAULT NULL,
  `CDivisionnaire` varchar(45) DEFAULT NULL,
  `Transit` decimal(15,2) DEFAULT NULL,
  `DSolde` decimal(15,2) DEFAULT NULL,
  `MC1320` decimal(15,2) DEFAULT NULL,
  `MBM1322` decimal(15,2) DEFAULT NULL,
  `VA133` decimal(15,2) DEFAULT NULL,
  `EBE134` decimal(15,2) DEFAULT NULL,
  `RE135` decimal(15,2) DEFAULT NULL,
  `T8_RF136` decimal(15,2) DEFAULT NULL,
  `RAO137` decimal(15,2) DEFAULT NULL,
  `RHAO138` decimal(15,2) DEFAULT NULL,
  `RNAIB139` decimal(15,2) DEFAULT NULL,
  `Impot89` decimal(15,2) DEFAULT NULL,
  `RNADI131` decimal(15,2) DEFAULT NULL,
  `DBilan` decimal(15,2) DEFAULT NULL,
  `CBilan` decimal(15,2) DEFAULT NULL,
  `RefPiece` varchar(45) DEFAULT NULL,
  `PlanComptable_idPlanComptable` int(11) NOT NULL,
  PRIMARY KEY (`idCorpMouv`),
  KEY `fk_T8_CorpMouv_T7_EnteteMouv1_idx` (`NumMouv`),
  KEY `fk_CorpMouv_PlanComptable1_idx` (`PlanComptable_idPlanComptable`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `corpmouv`
--

INSERT INTO `corpmouv` (`idCorpMouv`, `NumMouv`, `T6_CodeAnal`, `Imputation`, `Libelle`, `DMontant`, `CMontant`, `DCompte`, `CCompte`, `SCompte`, `CDivisionnaire`, `Transit`, `DSolde`, `MC1320`, `MBM1322`, `VA133`, `EBE134`, `RE135`, `T8_RF136`, `RAO137`, `RHAO138`, `RNAIB139`, `Impot89`, `RNADI131`, `DBilan`, `CBilan`, `RefPiece`, `PlanComptable_idPlanComptable`) VALUES
(9, NULL, '3', 'D', 'FGGFG', '2000.00', NULL, '611000000', NULL, '611', '6110', '2000.00', '2000.00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'DFGDFG', 3),
(10, NULL, '3', 'D', 'DFVDFV', '2000.00', NULL, '611000000', NULL, '611', '6110', '2000.00', '2000.00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'DFVDFV', 3),
(11, NULL, '3', 'D', NULL, '2000.00', NULL, '611000000', NULL, '611', '6110', '2000.00', '2000.00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3),
(12, NULL, '3', 'D', NULL, '2000.00', NULL, '611000000 ', NULL, '611', '6110', '2000.00', '2000.00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3),
(13, NULL, '3', 'D', NULL, '2000.00', NULL, '611000000 ', NULL, '611', '6110', '2000.00', '2000.00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3),
(14, NULL, '3', 'C', NULL, NULL, '2000.00', NULL, '445400000 ', '445', '4454', '2000.00', '-2000.00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 4),
(15, 21, '3', 'D', NULL, '2000.00', NULL, '611000000', NULL, '611', '6110', '2000.00', '2000.00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3),
(16, 21, '3', 'C', NULL, NULL, '2000.00', NULL, '445400000', '445', '4454', '2000.00', '-2000.00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 4),
(17, 22, '3', 'D', 'RTGRTG', '5000.00', NULL, '611000000', NULL, '611', '6110', '5000.00', '5000.00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'RTGRGT', 3),
(18, 22, '3', 'C', 'RTGRTG', NULL, '5000.00', NULL, '445400000', '445', '4454', '5000.00', '-5000.00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'RTGRGGRT', 4),
(19, 23, '3', 'D', NULL, '54000.00', NULL, '611000000', NULL, '611', '6110', '54000.00', '54000.00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3),
(20, 23, '3', 'C', NULL, NULL, '54000.00', NULL, '445400000', '445', '4454', '54000.00', '-54000.00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 4),
(21, 24, '3', 'D', NULL, '3000.00', NULL, '611000000', NULL, '611', '6110', '3000.00', '3000.00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3),
(22, 24, '3', 'C', NULL, NULL, '3000.00', NULL, '445400000', '445', '4454', '3000.00', '-3000.00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 4),
(23, 25, '1', 'D', 'Creation de logicciel', '1000.00', NULL, '445400000', NULL, '445', '4454', '1000.00', '-2000.00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 4),
(24, 25, '1', 'D', 'Creation de logicciel', '500.00', NULL, '611000000', NULL, '611', '6110', '500.00', '3500.00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3),
(25, 25, '1', 'C', 'Creation de logicciel', NULL, '1000.00', NULL, '138300000', '138', '1383', '1000.00', '-1000.00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1),
(26, 25, '1', 'C', 'Creation de logicciel', NULL, '500.00', NULL, '601100000', '601', '6011', '500.00', '-500.00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2);

-- --------------------------------------------------------

--
-- Table structure for table `donneecomptableimmo`
--

DROP TABLE IF EXISTS `donneecomptableimmo`;
CREATE TABLE IF NOT EXISTS `donneecomptableimmo` (
  `idDonneeComptableImmo` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `CoefficientReev` decimal(15,3) DEFAULT NULL,
  `AgeImmo` decimal(15,2) DEFAULT NULL,
  `DateReevaluation` date DEFAULT NULL,
  `ExerciceComptable` varchar(45) DEFAULT NULL,
  `Entreprise_idEntreprise` int(10) UNSIGNED NOT NULL,
  `RenseignementImmoId` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`idDonneeComptableImmo`),
  KEY `fk_DonneeComptableImmo_Entreprise1_idx` (`Entreprise_idEntreprise`),
  KEY `fk_DonneeComptableImmo_RenseignementImmo1_idx` (`RenseignementImmoId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `entetebilannormal`
--

DROP TABLE IF EXISTS `entetebilannormal`;
CREATE TABLE IF NOT EXISTS `entetebilannormal` (
  `idEnteteBilanNormal` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `NumeroBilan` varchar(45) DEFAULT NULL,
  `DateBilan` date DEFAULT NULL,
  `DateClotureBilan` date DEFAULT NULL,
  `NomResponsable` varchar(45) DEFAULT NULL,
  `ExerciceComptable` varchar(45) DEFAULT NULL,
  `TauxApplique` decimal(10,2) DEFAULT NULL,
  `EntrepriseId` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`idEnteteBilanNormal`),
  KEY `fk_EnteteBilanNormal_Entreprise1_idx` (`EntrepriseId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `entetebul`
--

DROP TABLE IF EXISTS `entetebul`;
CREATE TABLE IF NOT EXISTS `entetebul` (
  `idEnteteBul` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `MoiSal` varchar(45) DEFAULT NULL,
  `AnneeSal` varchar(45) DEFAULT NULL,
  `NHeureNor` decimal(15,2) DEFAULT NULL,
  `NJours` int(10) UNSIGNED DEFAULT NULL,
  `NJourMaladie` int(10) UNSIGNED DEFAULT NULL,
  `NheureS1` decimal(15,2) DEFAULT NULL,
  `NHeureS2` decimal(15,2) DEFAULT NULL,
  `NHeureF` decimal(15,2) DEFAULT NULL,
  `SalHeure1` decimal(15,2) DEFAULT NULL,
  `SalJour1` decimal(15,2) DEFAULT NULL,
  `TauxAlloc1` decimal(6,2) DEFAULT NULL,
  `TauxAllocExtra1` decimal(6,2) DEFAULT NULL,
  `RemBrute` decimal(15,2) DEFAULT NULL,
  `Retenue` decimal(15,2) DEFAULT NULL,
  `RemNette` decimal(15,2) DEFAULT NULL,
  `DateJour` timestamp NULL DEFAULT NULL,
  `Anciennete` decimal(15,2) DEFAULT NULL,
  `DateValeur` decimal(10,2) DEFAULT NULL,
  `TauxTPJ` decimal(10,2) DEFAULT NULL,
  `TauxPrimeAncien` decimal(15,2) DEFAULT NULL,
  `RembDiv` decimal(15,2) DEFAULT NULL,
  `TauxId` int(11) NOT NULL,
  `AgentId` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`idEnteteBul`),
  KEY `fk_EnteteBul_Taux1_idx` (`TauxId`),
  KEY `fk_EnteteBul_Agent1_idx` (`AgentId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `entetemouv`
--

DROP TABLE IF EXISTS `entetemouv`;
CREATE TABLE IF NOT EXISTS `entetemouv` (
  `idEnteteMouv` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `DateMouv` date DEFAULT NULL,
  `DateOper` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `CodeDoc` varchar(45) DEFAULT NULL,
  `NomDoc` varchar(45) DEFAULT NULL,
  `NumDoc` varchar(45) DEFAULT NULL,
  `Exercice` varchar(45) DEFAULT NULL,
  `TauxApp` decimal(10,3) DEFAULT NULL,
  `NomBeneficiaire` varchar(45) DEFAULT NULL,
  `NomDebiteur` varchar(45) DEFAULT NULL,
  `MotifGeneral` varchar(45) DEFAULT NULL,
  `DMontant` decimal(15,2) DEFAULT NULL,
  `CMontant` decimal(15,2) DEFAULT NULL,
  `FCMontant` decimal(15,2) DEFAULT NULL,
  `NumDoc1` varchar(45) DEFAULT NULL,
  `TauxEuro` decimal(11,4) DEFAULT NULL,
  `EntrepriseId` int(10) UNSIGNED NOT NULL,
  `userId` int(11) NOT NULL,
  `CategorieJournaux_idCategorieJournaux` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`idEnteteMouv`),
  KEY `fk_EnteteMouv_Entreprise1_idx` (`EntrepriseId`),
  KEY `fk_EnteteMouv_user1_idx` (`userId`),
  KEY `fk_EnteteMouv_CategorieJournaux1_idx` (`CategorieJournaux_idCategorieJournaux`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `entetemouv`
--

INSERT INTO `entetemouv` (`idEnteteMouv`, `DateMouv`, `DateOper`, `CodeDoc`, `NomDoc`, `NumDoc`, `Exercice`, `TauxApp`, `NomBeneficiaire`, `NomDebiteur`, `MotifGeneral`, `DMontant`, `CMontant`, `FCMontant`, `NumDoc1`, `TauxEuro`, `EntrepriseId`, `userId`, `CategorieJournaux_idCategorieJournaux`) VALUES
(16, '2021-08-31', '2021-08-30 22:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 5, 1, 1),
(17, '2021-08-31', '2021-08-30 22:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 5, 1, 1),
(18, '2021-08-31', '2021-08-30 22:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 5, 1, 1),
(19, '2021-08-31', '2021-08-30 22:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 5, 1, 1),
(20, '2021-08-31', '2021-08-30 22:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 5, 1, 1),
(21, '2021-08-31', '2021-08-30 22:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 5, 1, 1),
(22, '2021-09-01', '2021-08-31 22:00:00', 'RE', 'FERVFCF', NULL, '2021', '2000.000', 'JHHHJM', 'HJMHMJHM', 'EGFGRGT', '5000.00', '5000.00', NULL, '2555', NULL, 5, 1, 1),
(23, '2021-09-01', '2021-08-31 22:00:00', 'GHNGHN', 'GHNGHN', NULL, '2021', '400.000', 'dedwed', 'ddwdwe', NULL, '3000.00', '3000.00', NULL, '53546356', NULL, 5, 1, 1),
(24, '2021-09-01', '2021-08-31 22:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'FDVDVDV', '3000.00', '3000.00', NULL, NULL, NULL, 5, 1, 1),
(25, '2021-09-09', '2021-09-08 22:00:00', 'hfhfgh', 'gfhfghhg', NULL, '2021', '2000.000', NULL, NULL, NULL, '1500.00', '1500.00', '3000000.00', '125', NULL, 5, 1, 4);

-- --------------------------------------------------------

--
-- Table structure for table `entreprise`
--

DROP TABLE IF EXISTS `entreprise`;
CREATE TABLE IF NOT EXISTS `entreprise` (
  `idEntreprise` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `SCodeEntreprise` varchar(45) DEFAULT NULL,
  `SNomEntreprise` varchar(45) DEFAULT NULL,
  `RespoEntreprise` varchar(45) DEFAULT NULL,
  `TypeEntreprise` varchar(45) DEFAULT NULL,
  `SNumRue` varchar(45) DEFAULT NULL,
  `SNomRue` varchar(45) DEFAULT NULL,
  `SNumTel` varchar(45) DEFAULT NULL,
  `NumEmail` varchar(45) DEFAULT NULL,
  `DDebutActivite` datetime DEFAULT NULL,
  `DDComptabilite` datetime DEFAULT NULL,
  `entitede` int(10) UNSIGNED DEFAULT NULL,
  `commune_idCommune` int(11) NOT NULL,
  `NIF` varchar(15) DEFAULT NULL,
  `NbreJourTravailParSemaine` smallint(2) DEFAULT NULL,
  `NbreHeureDeTravailParJour` smallint(2) DEFAULT NULL,
  PRIMARY KEY (`idEntreprise`),
  KEY `fk_Entreprise_Entreprise1_idx` (`entitede`),
  KEY `fk_Entreprise_commune1_idx` (`commune_idCommune`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `entreprise`
--

INSERT INTO `entreprise` (`idEntreprise`, `SCodeEntreprise`, `SNomEntreprise`, `RespoEntreprise`, `TypeEntreprise`, `SNumRue`, `SNomRue`, `SNumTel`, `NumEmail`, `DDebutActivite`, `DDComptabilite`, `entitede`, `commune_idCommune`, `NIF`, `NbreJourTravailParSemaine`, `NbreHeureDeTravailParJour`) VALUES
(4, '001', 'Sertek plus', 'Josue KALUBI', 'sarlu', '213b', 'Shaumba', '085 22 54 236', 'sertek@gmail.com', '2018-02-05 00:00:00', '2020-05-06 00:00:00', NULL, 1, NULL, 5, 8),
(5, '251', 'Sertek-kin', 'Richard van', 'sarlu', '213b', 'ethip', '085 58 69 236', 'seffgrtek@gmail.com', '2018-02-05 00:00:00', '2020-05-06 00:00:00', 4, 2, NULL, 5, 8);

-- --------------------------------------------------------

--
-- Table structure for table `fonction`
--

DROP TABLE IF EXISTS `fonction`;
CREATE TABLE IF NOT EXISTS `fonction` (
  `idFonction` int(11) NOT NULL AUTO_INCREMENT,
  `Fonction` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idFonction`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `listecodesystemenormal`
--

DROP TABLE IF EXISTS `listecodesystemenormal`;
CREATE TABLE IF NOT EXISTS `listecodesystemenormal` (
  `idListeCodeSystemeNormal` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `CodeCompte` varchar(45) DEFAULT NULL,
  `DesignationRubrique` varchar(45) DEFAULT NULL,
  `ReferenceSysteme` varchar(45) DEFAULT NULL,
  `Niveau1` varchar(45) DEFAULT NULL,
  `T15_RefSystemeAllege` varchar(45) DEFAULT NULL,
  `MasseBilantaireId` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`idListeCodeSystemeNormal`),
  KEY `fk_ListeCodeSystemeNormal_MasseBilantaire1_idx` (`MasseBilantaireId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `logs`
--

DROP TABLE IF EXISTS `logs`;
CREATE TABLE IF NOT EXISTS `logs` (
  `idLogs` int(11) NOT NULL AUTO_INCREMENT,
  `logintime` datetime DEFAULT NULL,
  `logouttime` datetime DEFAULT NULL,
  `user_idUser` int(11) NOT NULL,
  PRIMARY KEY (`idLogs`),
  KEY `fk_Logs_user1_idx` (`user_idUser`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `massebilantaire`
--

DROP TABLE IF EXISTS `massebilantaire`;
CREATE TABLE IF NOT EXISTS `massebilantaire` (
  `idMasseBilantaire` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `CodeMasse` varchar(45) DEFAULT NULL,
  `DesignationMasse` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idMasseBilantaire`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `pays`
--

DROP TABLE IF EXISTS `pays`;
CREATE TABLE IF NOT EXISTS `pays` (
  `idPays` int(11) NOT NULL AUTO_INCREMENT,
  `pays` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idPays`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pays`
--

INSERT INTO `pays` (`idPays`, `pays`) VALUES
(1, 'République Démocratique Du Congo');

-- --------------------------------------------------------

--
-- Table structure for table `planamortnormal`
--

DROP TABLE IF EXISTS `planamortnormal`;
CREATE TABLE IF NOT EXISTS `planamortnormal` (
  `idPlanAmortNormal` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `AnneeAnuite` varchar(45) DEFAULT NULL,
  `BaseAmortissement` decimal(15,2) DEFAULT NULL,
  `Annuite` decimal(15,2) DEFAULT NULL,
  `ValeurComptable` decimal(15,2) DEFAULT NULL,
  `Observation` varchar(45) DEFAULT NULL,
  `RenseignementImmo_idRenseignementImmo` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`idPlanAmortNormal`),
  KEY `fk_PlanAmortNormal_RenseignementImmo1_idx` (`RenseignementImmo_idRenseignementImmo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `plancomptable`
--

DROP TABLE IF EXISTS `plancomptable`;
CREATE TABLE IF NOT EXISTS `plancomptable` (
  `idPlanComptable` int(11) NOT NULL AUTO_INCREMENT,
  `NumCompte` int(10) UNSIGNED DEFAULT NULL,
  `Numclasse` varchar(45) DEFAULT NULL,
  `CompteOperation` varchar(45) DEFAULT NULL,
  `DesiOperation` varchar(255) DEFAULT NULL,
  `DesiClassel` varchar(45) DEFAULT NULL,
  `ComptePrinci` varchar(45) DEFAULT NULL,
  `DesiComptePrinci` varchar(45) DEFAULT NULL,
  `SousCompte` varchar(45) DEFAULT NULL,
  `DesiSousCompte` varchar(45) DEFAULT NULL,
  `CodeDivision` varchar(45) DEFAULT NULL,
  `CodeFamille` varchar(45) DEFAULT NULL,
  `DesiFamille` varchar(45) DEFAULT NULL,
  `RefCompte` varchar(45) DEFAULT NULL,
  `Lettrage1` varchar(45) DEFAULT NULL,
  `Lettrage2` varchar(45) DEFAULT NULL,
  `Lettrage3` varchar(45) DEFAULT NULL,
  `Lettrage4` varchar(45) DEFAULT NULL,
  `DesiDivision` varchar(45) DEFAULT NULL,
  `debit` decimal(15,2) NOT NULL,
  `credit` decimal(15,2) NOT NULL,
  `typeCompte` smallint(2) UNSIGNED NOT NULL DEFAULT '1',
  PRIMARY KEY (`idPlanComptable`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `plancomptable`
--

INSERT INTO `plancomptable` (`idPlanComptable`, `NumCompte`, `Numclasse`, `CompteOperation`, `DesiOperation`, `DesiClassel`, `ComptePrinci`, `DesiComptePrinci`, `SousCompte`, `DesiSousCompte`, `CodeDivision`, `CodeFamille`, `DesiFamille`, `RefCompte`, `Lettrage1`, `Lettrage2`, `Lettrage3`, `Lettrage4`, `DesiDivision`, `debit`, `credit`, `typeCompte`) VALUES
(1, 138300000, '1', '138300000', 'Resultat de Scission', 'Comptes des ressources durables', '13', 'Resultat net de l\'exercice', '138', 'Resultat hors activite', '1383', '138300', 'Resultat de Scission', NULL, 'UQD2', NULL, NULL, NULL, 'Resultat de Scission', '0.00', '1000.00', 1),
(2, 601100000, '6', '601100000', 'Achat des marchandises test', 'Comptes des charges des activités ordinaire', '60', 'Achat et variation du stock', '601', 'Achat de marchandises', '6011', '601100', 'Achat dans la region', '60110', 'cadf4', 'cadf4', 'cadf4', 'cadf4', 'Achat dans la region', '0.00', '500.00', 1),
(3, 611000000, '6', '611000000', 'Transport marchandises test', 'Charges des activites ordinaires', '61', 'Transports', '611', 'Transport sur achat', '6110', '611000', 'Transport sur achat', '61100', 'ddfff', 'ffff', 'ffff', 'sdsd', 'Transport sur achat', '3500.00', '0.00', 1),
(4, 445400000, '4', '445400000', 'Taxes sur services exterieurs et autres charges', 'Tiers', '44', 'Etats et collectivités publiques', '445', 'Etats, TVA Recupérables', '4454', '445400', 'Etats, TVA Recupérables', 'fvvfvf', 'svvv', 'ssvsv', 'svsvvs', 'ssvsdv', 'Etats, TVA Recupérables', '1000.00', '3000.00', 1),
(5, 401100000, '4', '401100000', 'Fournisseur produit test', 'Tiers', '40', 'Fournisseur et compte Rattachés', '401', 'Fournisseurs, dettes en comptes', '4011', '401100', 'Fournisseurs', 'dfdfd', 'zfzfzfzf', 'zffzf', 'zfzfzf', 'zfff', 'Fournisseurs', '0.00', '0.00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `province`
--

DROP TABLE IF EXISTS `province`;
CREATE TABLE IF NOT EXISTS `province` (
  `idProvince` int(11) NOT NULL AUTO_INCREMENT,
  `province` varchar(45) DEFAULT NULL,
  `paysId` int(11) NOT NULL,
  PRIMARY KEY (`idProvince`),
  KEY `fk_Province_pays1_idx` (`paysId`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `province`
--

INSERT INTO `province` (`idProvince`, `province`, `paysId`) VALUES
(1, 'Kinshasa', 1),
(2, 'Lubumbashi', 1);

-- --------------------------------------------------------

--
-- Table structure for table `renseignementimmo`
--

DROP TABLE IF EXISTS `renseignementimmo`;
CREATE TABLE IF NOT EXISTS `renseignementimmo` (
  `idRenseignementImmo` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `DesignationImmo` varchar(45) DEFAULT NULL,
  `DateAcquisition` date DEFAULT NULL,
  `CodeImmo` varchar(45) DEFAULT NULL,
  `Compte22` varchar(45) DEFAULT NULL,
  `Compte28` varchar(45) DEFAULT NULL,
  `Compte68` varchar(45) DEFAULT NULL,
  `TauxAmortissement` decimal(5,2) DEFAULT NULL,
  `DureeImmo` decimal(5,2) DEFAULT NULL,
  `ValeurBrute` decimal(15,2) DEFAULT NULL,
  `LieuAffectation` varchar(45) DEFAULT NULL,
  `TauxChangeIitial` decimal(10,3) DEFAULT NULL,
  `EcartDeReev_14_106` varchar(45) DEFAULT NULL,
  `QteInitiale` decimal(15,2) DEFAULT NULL,
  `QteInvantaire` decimal(15,2) DEFAULT NULL,
  `TauxReevaluationV` decimal(7,3) DEFAULT NULL,
  `ExerciceTauxRev` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idRenseignementImmo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `rubrique`
--

DROP TABLE IF EXISTS `rubrique`;
CREATE TABLE IF NOT EXISTS `rubrique` (
  `idRubrique` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `CodeRub` varchar(45) DEFAULT NULL,
  `NomRub` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idRubrique`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `service`
--

DROP TABLE IF EXISTS `service`;
CREATE TABLE IF NOT EXISTS `service` (
  `idService` int(11) NOT NULL AUTO_INCREMENT,
  `codeService` varchar(45) DEFAULT NULL,
  `Service` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idService`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `souscompte`
--

DROP TABLE IF EXISTS `souscompte`;
CREATE TABLE IF NOT EXISTS `souscompte` (
  `idSousCompte` int(11) NOT NULL AUTO_INCREMENT,
  `CodeSousCompte` varchar(45) DEFAULT NULL,
  `Designation` varchar(45) DEFAULT NULL,
  `ComptePrincipal_idComptePrincipal` int(11) NOT NULL,
  PRIMARY KEY (`idSousCompte`),
  KEY `fk_SousCompte_ComptePrincipal1_idx` (`ComptePrincipal_idComptePrincipal`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `souscompte`
--

INSERT INTO `souscompte` (`idSousCompte`, `CodeSousCompte`, `Designation`, `ComptePrincipal_idComptePrincipal`) VALUES
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

-- --------------------------------------------------------

--
-- Table structure for table `suiviimmo`
--

DROP TABLE IF EXISTS `suiviimmo`;
CREATE TABLE IF NOT EXISTS `suiviimmo` (
  `idSuiviImmo` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `DateSuivi` date DEFAULT NULL,
  `QteDepart` decimal(15,2) DEFAULT NULL,
  `EtatMateriel` varchar(45) DEFAULT NULL,
  `QteDeplace` decimal(15,2) DEFAULT NULL,
  `CauseDap` varchar(45) DEFAULT NULL,
  `NouveauLieu` varchar(45) DEFAULT NULL,
  `NouveauRespo` varchar(45) DEFAULT NULL,
  `T9_QteInvantaire` decimal(15,2) DEFAULT NULL,
  `RenseignementImmoId` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`idSuiviImmo`),
  KEY `fk_SuiviImmo_RenseignementImmo1_idx` (`RenseignementImmoId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `taux`
--

DROP TABLE IF EXISTS `taux`;
CREATE TABLE IF NOT EXISTS `taux` (
  `idTaux` int(11) NOT NULL AUTO_INCREMENT,
  `Dollars` varchar(45) DEFAULT NULL,
  `Euro` varchar(45) DEFAULT NULL,
  `Fc` varchar(45) DEFAULT NULL,
  `dateTaux` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`idTaux`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `idUser` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(45) DEFAULT NULL,
  `role` varchar(45) DEFAULT NULL,
  `login` varchar(45) DEFAULT NULL,
  `mpd` varchar(100) DEFAULT NULL,
  `specialCode` varchar(45) DEFAULT 'Pour le cas des comptables, code comptable',
  PRIMARY KEY (`idUser`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`idUser`, `nom`, `role`, `login`, `mpd`, `specialCode`) VALUES
(1, 'sertek', 'admin', 'sam', '4e19302af21c1b0ec7a3d1f151ac4b2a9ed4b986', NULL),
(2, 'Samuel Wabwana', 'comptable', 'sam001', '91bc92adee53c6ac0725689bc879506ebb415734', '001'),
(3, 'Josue Kalubi', 'comptable', 'jos002', 'c8a98a14afd4623328ed7b570e66ced088222578', '002'),
(4, 'Amedee B-shop', 'consultant', 'ame003', '282e897edf88ef8713415d05d9e6b976114f97ec', '003');

-- --------------------------------------------------------

--
-- Table structure for table `userjournal`
--

DROP TABLE IF EXISTS `userjournal`;
CREATE TABLE IF NOT EXISTS `userjournal` (
  `idUserJournal` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `journal_id` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`idUserJournal`),
  KEY `fk_userJournal_user` (`user_id`),
  KEY `fk_userJournal_journal` (`journal_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `balancecloture`
--
ALTER TABLE `balancecloture`
  ADD CONSTRAINT `fk_BalanceCloture_Entreprise1` FOREIGN KEY (`EntrepriseId`) REFERENCES `entreprise` (`idEntreprise`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `corpmouv`
--
ALTER TABLE `corpmouv`
  ADD CONSTRAINT `fk_T8_CorpMouv_T7_EnteteMouv1` FOREIGN KEY (`NumMouv`) REFERENCES `entetemouv` (`idEnteteMouv`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `userjournal`
--
ALTER TABLE `userjournal`
  ADD CONSTRAINT `fk_userJournal_journal` FOREIGN KEY (`journal_id`) REFERENCES `categoriejournaux` (`idCategorieJournaux`),
  ADD CONSTRAINT `fk_userJournal_user` FOREIGN KEY (`user_id`) REFERENCES `user` (`idUser`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
