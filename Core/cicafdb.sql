-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 06, 2022 at 05:27 AM
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
-- Table structure for table `articles`
--

DROP TABLE IF EXISTS `articles`;
CREATE TABLE IF NOT EXISTS `articles` (
  `id_article` bigint(11) NOT NULL AUTO_INCREMENT,
  `article` varchar(500) DEFAULT NULL,
  `users_id_users` bigint(11) DEFAULT NULL,
  PRIMARY KEY (`id_article`),
  KEY `FK_Articles_users_id_users` (`users_id_users`)
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
(5, 'E', 'Op&eacute;rations diverses');

-- --------------------------------------------------------

--
-- Table structure for table `classe`
--

DROP TABLE IF EXISTS `classe`;
CREATE TABLE IF NOT EXISTS `classe` (
  `idClasse` int(11) NOT NULL AUTO_INCREMENT,
  `CodeClasse` smallint(6) DEFAULT NULL,
  `Designation` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`idClasse`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `classe`
--

INSERT INTO `classe` (`idClasse`, `CodeClasse`, `Designation`) VALUES
(17, 1, 'q');

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

DROP TABLE IF EXISTS `client`;
CREATE TABLE IF NOT EXISTS `client` (
  `id_client` bigint(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) DEFAULT NULL,
  `prenom` varchar(50) DEFAULT NULL,
  `contact_id_contact` bigint(11) DEFAULT NULL,
  PRIMARY KEY (`id_client`),
  KEY `FK_Client_contact_id_contact_contact` (`contact_id_contact`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
-- Table structure for table `commande`
--

DROP TABLE IF EXISTS `commande`;
CREATE TABLE IF NOT EXISTS `commande` (
  `id_com` bigint(50) NOT NULL AUTO_INCREMENT,
  `numero_commande` int(11) DEFAULT NULL,
  `date_Commande` datetime DEFAULT NULL,
  PRIMARY KEY (`id_com`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `commentaires`
--

DROP TABLE IF EXISTS `commentaires`;
CREATE TABLE IF NOT EXISTS `commentaires` (
  `id_comment` bigint(11) NOT NULL AUTO_INCREMENT,
  `commentaire_Commentaires` varchar(500) DEFAULT NULL,
  `id_membre` bigint(11) DEFAULT NULL,
  `articles_id_article` bigint(11) DEFAULT NULL,
  PRIMARY KEY (`id_comment`),
  KEY `FK_Commentaires_id_membre_membres` (`id_membre`),
  KEY `FK_Commentaires_articles_id_acticle_articles` (`articles_id_article`)
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `compteprincipal`
--

INSERT INTO `compteprincipal` (`idComptePrincipal`, `CodeComptePrincipal`, `DesignationCompte`, `Classe_idClasse`) VALUES
(1, '10', 'asasdasasd', 1),
(2, '11', 'ssdsdsdfsdfsdfdsf', 1),
(3, '11', 'ssdsdsdfsdfsdfdsf', 1),
(4, '12', 'saaasdasxdasxasxasxasx', 1),
(5, '13', 'aqeqeqeqwe', 1),
(6, '13', 'aqeqeqeqwe', 1),
(7, '15', 'qwweqweqweqwe', 1),
(8, '19', 'saaasdasxdasxasxasxasx', 1),
(9, '18', 'asasdasasd', 1);

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

DROP TABLE IF EXISTS `contact`;
CREATE TABLE IF NOT EXISTS `contact` (
  `id_contact` bigint(11) NOT NULL AUTO_INCREMENT,
  `adresse` varchar(50) DEFAULT NULL,
  `Telephone` varchar(50) DEFAULT NULL,
  `e_mail` varchar(50) DEFAULT NULL,
  `client_id_client` bigint(11) DEFAULT NULL,
  `prospect_id_prospect` bigint(11) DEFAULT NULL,
  PRIMARY KEY (`id_contact`),
  KEY `FK_Contact_client_id_client_client` (`client_id_client`),
  KEY `FK_Contact_prospect_id_prospect_prospect` (`prospect_id_prospect`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `contenir`
--

DROP TABLE IF EXISTS `contenir`;
CREATE TABLE IF NOT EXISTS `contenir` (
  `id_com` bigint(50) NOT NULL AUTO_INCREMENT,
  `id_service` bigint(50) NOT NULL,
  PRIMARY KEY (`id_com`,`id_service`),
  KEY `FK_Contenir_id_service_Services` (`id_service`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
) ENGINE=InnoDB AUTO_INCREMENT=47 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `entreprise`
--

INSERT INTO `entreprise` (`idEntreprise`, `SCodeEntreprise`, `SNomEntreprise`, `RespoEntreprise`, `TypeEntreprise`, `SNumRue`, `SNomRue`, `SNumTel`, `NumEmail`, `DDebutActivite`, `DDComptabilite`, `entitede`, `commune_idCommune`, `NIF`, `NbreJourTravailParSemaine`, `NbreHeureDeTravailParJour`) VALUES
(4, '001', 'Sertek plus', 'Josue KALUBI', 'service', '213b', 'Shaumba', '085 22 54 236', 'sertek@gmail.com', '2018-02-05 00:00:00', '2020-05-06 00:00:00', NULL, 1, 'f256-565', 5, 8),
(5, '251', 'Sertek-kin', 'Richard van', 'sarlu', '213b', 'ethip', '085 58 69 236', 'seffgrtek@gmail.com', '2018-02-05 00:00:00', '2020-05-06 00:00:00', 4, 2, NULL, 5, 8),
(28, '2556', 'Vodacom', 'Eli&eacute;', 'service', '56', 'Haut Huele', '08255455255', 'sqm@gmail.com', '2021-10-29 00:00:00', '2021-10-29 00:00:00', NULL, 3, 'dddd', 6, 6),
(39, '00567', 'Sertek Gom&eacute;', 'herve', NULL, '56', 'Haut Huele', '08255455255', NULL, NULL, NULL, 4, 4, NULL, NULL, NULL),
(46, '002', 'Microcom', 'Berthe', 'vente service internet', '56', 'kabasele', '0990252541', 'microcom@gmail', '2021-11-04 00:00:00', '2021-11-04 00:00:00', NULL, 1, 'fghde', 5, 5);

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
-- Table structure for table `forum`
--

DROP TABLE IF EXISTS `forum`;
CREATE TABLE IF NOT EXISTS `forum` (
  `id_forum` bigint(50) NOT NULL AUTO_INCREMENT,
  `sujet` varchar(250) DEFAULT NULL,
  `id_Users` bigint(50) DEFAULT NULL,
  `id_membre` bigint(50) DEFAULT NULL,
  PRIMARY KEY (`id_forum`),
  KEY `FK_Forum_id_Users` (`id_Users`),
  KEY `FK_Forum_id_membre_membres` (`id_membre`)
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
-- Table structure for table `membres`
--

DROP TABLE IF EXISTS `membres`;
CREATE TABLE IF NOT EXISTS `membres` (
  `id_membre` bigint(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) DEFAULT NULL,
  `prenom` varchar(50) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `pwd` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_membre`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

DROP TABLE IF EXISTS `message`;
CREATE TABLE IF NOT EXISTS `message` (
  `id_message` bigint(11) NOT NULL AUTO_INCREMENT,
  `message` varchar(500) DEFAULT NULL,
  `id_prospect` bigint(11) DEFAULT NULL,
  PRIMARY KEY (`id_message`),
  KEY `FK_Message_id_prospect_Prospect` (`id_prospect`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `messageforum`
--

DROP TABLE IF EXISTS `messageforum`;
CREATE TABLE IF NOT EXISTS `messageforum` (
  `id_MF` bigint(11) NOT NULL AUTO_INCREMENT,
  `message` varchar(500) DEFAULT NULL,
  `forum_id_forum` bigint(11) DEFAULT NULL,
  `id_membre` bigint(11) DEFAULT NULL,
  PRIMARY KEY (`id_MF`),
  KEY `FK_MessageForum_forum_id_forum_forum` (`forum_id_forum`),
  KEY `FK_MessageForum_id_membre_membres` (`id_membre`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `passer`
--

DROP TABLE IF EXISTS `passer`;
CREATE TABLE IF NOT EXISTS `passer` (
  `id_client` bigint(11) NOT NULL AUTO_INCREMENT,
  `id_com` bigint(11) NOT NULL,
  `Quantite` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_client`,`id_com`),
  KEY `FK_Passer_id_com_Commande` (`id_com`)
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
-- Table structure for table `peutenvoyer`
--

DROP TABLE IF EXISTS `peutenvoyer`;
CREATE TABLE IF NOT EXISTS `peutenvoyer` (
  `id_client` bigint(11) NOT NULL AUTO_INCREMENT,
  `id_message` bigint(11) NOT NULL,
  PRIMARY KEY (`id_client`,`id_message`),
  KEY `FK_PeutEnvoyer_id_message_Message` (`id_message`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
  `solde` decimal(15,2) NOT NULL DEFAULT '0.00',
  `typeCompte` smallint(2) UNSIGNED NOT NULL DEFAULT '1',
  `entiteId` int(10) UNSIGNED DEFAULT NULL,
  PRIMARY KEY (`idPlanComptable`),
  KEY `fk_plancomptable_entreprise` (`entiteId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `prospect`
--

DROP TABLE IF EXISTS `prospect`;
CREATE TABLE IF NOT EXISTS `prospect` (
  `id_prospect` bigint(11) NOT NULL AUTO_INCREMENT,
  `prospect` varchar(500) DEFAULT NULL,
  `contact_id_contact` bigint(11) DEFAULT NULL,
  PRIMARY KEY (`id_prospect`),
  KEY `FK_Prospect_contact_id_contact_contact` (`contact_id_contact`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
-- Table structure for table `services`
--

DROP TABLE IF EXISTS `services`;
CREATE TABLE IF NOT EXISTS `services` (
  `id_service` bigint(11) NOT NULL AUTO_INCREMENT,
  `designation` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_service`)
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
  `login` varchar(45) DEFAULT NULL,
  `mpd` varchar(100) DEFAULT NULL,
  `specialCode` varchar(45) DEFAULT 'Pour le cas des comptables, code comptable',
  `entrepriseId` int(10) UNSIGNED DEFAULT NULL,
  PRIMARY KEY (`idUser`),
  KEY `fk_user_entreprise` (`entrepriseId`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`idUser`, `nom`, `login`, `mpd`, `specialCode`, `entrepriseId`) VALUES
(1, 'samuel kem', 'sam', '4e19302af21c1b0ec7a3d1f151ac4b2a9ed4b986', NULL, NULL),
(2, 'Daniel MANGILI', 'daniel', 'db1f66fa364f6dd9faa7541d7913a434921ff6ee', '002', NULL);

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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `userjournal`
--

INSERT INTO `userjournal` (`idUserJournal`, `user_id`, `journal_id`) VALUES
(1, 2, 5);

-- --------------------------------------------------------

--
-- Table structure for table `userpermission`
--

DROP TABLE IF EXISTS `userpermission`;
CREATE TABLE IF NOT EXISTS `userpermission` (
  `idUserPermission` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `adminRead` tinyint(1) NOT NULL DEFAULT '0',
  `adminWrite` tinyint(1) NOT NULL DEFAULT '0',
  `comptaRead` tinyint(1) NOT NULL DEFAULT '0',
  `comptaWrite` tinyint(1) NOT NULL DEFAULT '0',
  `budgetRead` tinyint(1) NOT NULL DEFAULT '0',
  `budgetWrite` tinyint(1) NOT NULL DEFAULT '0',
  `personnelRead` tinyint(1) NOT NULL DEFAULT '0',
  `personnelWrite` tinyint(1) NOT NULL DEFAULT '0',
  `amortissementRead` tinyint(1) NOT NULL DEFAULT '0',
  `amortissementWrite` tinyint(1) NOT NULL DEFAULT '0',
  `entrepriseRead` tinyint(1) NOT NULL DEFAULT '0',
  `entrepriseWrite` tinyint(1) NOT NULL DEFAULT '0',
  `userId` int(11) DEFAULT NULL,
  PRIMARY KEY (`idUserPermission`),
  KEY `fk__userpermission_user` (`userId`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `userpermission`
--

INSERT INTO `userpermission` (`idUserPermission`, `adminRead`, `adminWrite`, `comptaRead`, `comptaWrite`, `budgetRead`, `budgetWrite`, `personnelRead`, `personnelWrite`, `amortissementRead`, `amortissementWrite`, `entrepriseRead`, `entrepriseWrite`, `userId`) VALUES
(1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1),
(2, 0, 0, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 2);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id_Users` bigint(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) DEFAULT NULL,
  `prenom` varchar(50) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `pwd` varchar(50) DEFAULT NULL,
  `role` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_Users`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `articles`
--
ALTER TABLE `articles`
  ADD CONSTRAINT `FK_Articles_users_id_users` FOREIGN KEY (`users_id_users`) REFERENCES `users` (`id_Users`);

--
-- Constraints for table `balancecloture`
--
ALTER TABLE `balancecloture`
  ADD CONSTRAINT `fk_BalanceCloture_Entreprise1` FOREIGN KEY (`EntrepriseId`) REFERENCES `entreprise` (`idEntreprise`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `client`
--
ALTER TABLE `client`
  ADD CONSTRAINT `FK_Client_contact_id_contact_contact` FOREIGN KEY (`contact_id_contact`) REFERENCES `contact` (`id_contact`);

--
-- Constraints for table `commentaires`
--
ALTER TABLE `commentaires`
  ADD CONSTRAINT `FK_Commentaires_articles_id_acticle_articles` FOREIGN KEY (`articles_id_article`) REFERENCES `articles` (`id_article`),
  ADD CONSTRAINT `FK_Commentaires_id_membre_membres` FOREIGN KEY (`id_membre`) REFERENCES `membres` (`id_membre`);

--
-- Constraints for table `contact`
--
ALTER TABLE `contact`
  ADD CONSTRAINT `FK_Contact_client_id_client_client` FOREIGN KEY (`client_id_client`) REFERENCES `client` (`id_client`),
  ADD CONSTRAINT `FK_Contact_prospect_id_prospect_prospect` FOREIGN KEY (`prospect_id_prospect`) REFERENCES `prospect` (`id_prospect`);

--
-- Constraints for table `contenir`
--
ALTER TABLE `contenir`
  ADD CONSTRAINT `FK_Contenir_id_com_Commande` FOREIGN KEY (`id_com`) REFERENCES `commande` (`id_com`),
  ADD CONSTRAINT `FK_Contenir_id_service_Services` FOREIGN KEY (`id_service`) REFERENCES `services` (`id_service`);

--
-- Constraints for table `corpmouv`
--
ALTER TABLE `corpmouv`
  ADD CONSTRAINT `fk_T8_CorpMouv_T7_EnteteMouv1` FOREIGN KEY (`NumMouv`) REFERENCES `entetemouv` (`idEnteteMouv`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `forum`
--
ALTER TABLE `forum`
  ADD CONSTRAINT `FK_Forum_id_Users` FOREIGN KEY (`id_Users`) REFERENCES `users` (`id_Users`),
  ADD CONSTRAINT `FK_Forum_id_membre_membres` FOREIGN KEY (`id_membre`) REFERENCES `membres` (`id_membre`);

--
-- Constraints for table `message`
--
ALTER TABLE `message`
  ADD CONSTRAINT `FK_Message_id_prospect_Prospect` FOREIGN KEY (`id_prospect`) REFERENCES `prospect` (`id_prospect`);

--
-- Constraints for table `messageforum`
--
ALTER TABLE `messageforum`
  ADD CONSTRAINT `FK_MessageForum_forum_id_forum_forum` FOREIGN KEY (`forum_id_forum`) REFERENCES `forum` (`id_forum`),
  ADD CONSTRAINT `FK_MessageForum_id_membre_membres` FOREIGN KEY (`id_membre`) REFERENCES `membres` (`id_membre`);

--
-- Constraints for table `passer`
--
ALTER TABLE `passer`
  ADD CONSTRAINT `FK_Passer_id_client_Client` FOREIGN KEY (`id_client`) REFERENCES `client` (`id_client`),
  ADD CONSTRAINT `FK_Passer_id_com_Commande` FOREIGN KEY (`id_com`) REFERENCES `commande` (`id_com`);

--
-- Constraints for table `peutenvoyer`
--
ALTER TABLE `peutenvoyer`
  ADD CONSTRAINT `FK_PeutEnvoyer_id_client_Client` FOREIGN KEY (`id_client`) REFERENCES `client` (`id_client`),
  ADD CONSTRAINT `FK_PeutEnvoyer_id_message_Message` FOREIGN KEY (`id_message`) REFERENCES `message` (`id_message`);

--
-- Constraints for table `plancomptable`
--
ALTER TABLE `plancomptable`
  ADD CONSTRAINT `fk_plancomptable_entreprise` FOREIGN KEY (`entiteId`) REFERENCES `entreprise` (`idEntreprise`);

--
-- Constraints for table `prospect`
--
ALTER TABLE `prospect`
  ADD CONSTRAINT `FK_Prospect_contact_id_contact_contact` FOREIGN KEY (`contact_id_contact`) REFERENCES `contact` (`id_contact`);

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `fk_user_entreprise` FOREIGN KEY (`entrepriseId`) REFERENCES `entreprise` (`idEntreprise`);

--
-- Constraints for table `userjournal`
--
ALTER TABLE `userjournal`
  ADD CONSTRAINT `fk_userJournal_journal` FOREIGN KEY (`journal_id`) REFERENCES `categoriejournaux` (`idCategorieJournaux`),
  ADD CONSTRAINT `fk_userJournal_user` FOREIGN KEY (`user_id`) REFERENCES `user` (`idUser`);

--
-- Constraints for table `userpermission`
--
ALTER TABLE `userpermission`
  ADD CONSTRAINT `fk__userpermission_user` FOREIGN KEY (`userId`) REFERENCES `user` (`idUser`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
