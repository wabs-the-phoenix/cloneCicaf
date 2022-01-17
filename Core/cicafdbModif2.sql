-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : ven. 06 août 2021 à 04:22
-- Version du serveur :  5.7.31
-- Version de PHP : 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `cicafdb`
--

-- --------------------------------------------------------

--
-- Structure de la table `agent`
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
-- Structure de la table `balancecloture`
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
-- Structure de la table `budget`
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
-- Structure de la table `categoriejournaux`
--

DROP TABLE IF EXISTS `categoriejournaux`;
CREATE TABLE IF NOT EXISTS `categoriejournaux` (
  `idCategorieJournaux` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `CodeJournal` varchar(45) DEFAULT NULL,
  `NomJournal` varchar(45) DEFAULT NULL,
  `RespoJournal` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idCategorieJournaux`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `categoriejournaux`
--

INSERT INTO `categoriejournaux` (`idCategorieJournaux`, `CodeJournal`, `NomJournal`, `RespoJournal`) VALUES
(1, 'A', 'Caisse', 'Samuel Wabwana'),
(2, 'BC', 'Banque', 'Josue Kalubi');

-- --------------------------------------------------------

--
-- Structure de la table `classe`
--

DROP TABLE IF EXISTS `classe`;
CREATE TABLE IF NOT EXISTS `classe` (
  `idClasse` int(11) NOT NULL AUTO_INCREMENT,
  `CodeClasse` smallint(6) DEFAULT NULL,
  `Designation` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idClasse`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `codeprojet`
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
-- Structure de la table `commune`
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
-- Déchargement des données de la table `commune`
--

INSERT INTO `commune` (`idCommune`, `commune`, `ProvinceId`) VALUES
(1, 'Gombe', 1),
(2, 'Kinshasa', 1),
(3, 'Lingwala', 1),
(4, 'Kamalondo', 2),
(5, 'Barumbu', 1);

-- --------------------------------------------------------

--
-- Structure de la table `compteanalityque`
--

DROP TABLE IF EXISTS `compteanalityque`;
CREATE TABLE IF NOT EXISTS `compteanalityque` (
  `idCompteAnalityque` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `DesiAnal` varchar(45) DEFAULT NULL,
  `DateAnal` datetime DEFAULT NULL,
  PRIMARY KEY (`idCompteAnalityque`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `compteanalityque`
--

INSERT INTO `compteanalityque` (`idCompteAnalityque`, `DesiAnal`, `DateAnal`) VALUES
(1, 'Creation du logiciel web', '2021-05-03 10:00:01'),
(2, 'Achat de chaise', '2021-05-15 10:00:01'),
(3, 'Achat computer', '2021-07-07 18:00:01');

-- --------------------------------------------------------

--
-- Structure de la table `compteanalytique`
--

DROP TABLE IF EXISTS `compteanalytique`;
CREATE TABLE IF NOT EXISTS `compteanalytique` (
  `idCompteAnalytique` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `DesiAnal` varchar(45) DEFAULT NULL,
  `DateAnal` datetime DEFAULT NULL,
  PRIMARY KEY (`idCompteAnalytique`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `compteanalytique`
--

INSERT INTO `compteanalytique` (`idCompteAnalytique`, `DesiAnal`, `DateAnal`) VALUES
(1, 'Creation du logiciel web', '2021-05-03 10:00:01'),
(2, 'Achat de chaise', '2021-05-20 20:00:01');

-- --------------------------------------------------------

--
-- Structure de la table `comptedivisionnaire`
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
-- Structure de la table `comptefamille`
--

DROP TABLE IF EXISTS `comptefamille`;
CREATE TABLE IF NOT EXISTS `comptefamille` (
  `idCompteFamille` int(11) NOT NULL,
  `CodeCompteFamille` varchar(45) DEFAULT NULL,
  `DesigantionCompteFamille` varchar(45) DEFAULT NULL,
  `CompteDivisionnaire_idCompteDivisionnaire` int(11) NOT NULL,
  PRIMARY KEY (`idCompteFamille`),
  KEY `fk_CompteFamille_CompteDivisionnaire1_idx` (`CompteDivisionnaire_idCompteDivisionnaire`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `compteprincipal`
--

DROP TABLE IF EXISTS `compteprincipal`;
CREATE TABLE IF NOT EXISTS `compteprincipal` (
  `idComptePrincipal` int(11) NOT NULL,
  `CodeComptePrincipal` varchar(45) DEFAULT NULL,
  `DesignationCompte` varchar(45) DEFAULT NULL,
  `Classe_idClasse` int(11) NOT NULL,
  PRIMARY KEY (`idComptePrincipal`),
  KEY `fk_ComptePrincipal_Classe1_idx` (`Classe_idClasse`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `corpbalance`
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
-- Structure de la table `corpbilannormalise`
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
-- Structure de la table `corpbudget`
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
-- Structure de la table `corpbudget_has_budget`
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
-- Structure de la table `corpbulletin`
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
-- Structure de la table `corpmouv`
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
-- Structure de la table `donneecomptableimmo`
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
-- Structure de la table `entetebilannormal`
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
-- Structure de la table `entetebul`
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
-- Structure de la table `entetemouv`
--

DROP TABLE IF EXISTS `entetemouv`;
CREATE TABLE IF NOT EXISTS `entetemouv` (
  `idEntetMouv` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
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
  PRIMARY KEY (`idEntetMouv`),
  KEY `fk_EnteteMouv_Entreprise1_idx` (`EntrepriseId`),
  KEY `fk_EnteteMouv_user1_idx` (`userId`),
  KEY `fk_EnteteMouv_CategorieJournaux1_idx` (`CategorieJournaux_idCategorieJournaux`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `entreprise`
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
-- Déchargement des données de la table `entreprise`
--

INSERT INTO `entreprise` (`idEntreprise`, `SCodeEntreprise`, `SNomEntreprise`, `RespoEntreprise`, `TypeEntreprise`, `SNumRue`, `SNomRue`, `SNumTel`, `NumEmail`, `DDebutActivite`, `DDComptabilite`, `entitede`, `commune_idCommune`, `NIF`, `NbreJourTravailParSemaine`, `NbreHeureDeTravailParJour`) VALUES
(4, '001', 'Sertek plus', 'Josue KALUBI', 'Société de Personnes à Responsabilité Limité', '213b', 'Shaumba', '085 22 54 236', 'sertek@gmail.com', '2018-02-05 00:00:00', '2020-05-06 00:00:00', NULL, 1, NULL, 5, 8),
(5, '251', 'Sertek-kin', 'Richard van', 'Société de Personnes à Responsabilité Limité', '213b', 'ethip', '085 58 69 236', 'seffgrtek@gmail.com', '2018-02-05 00:00:00', '2020-05-06 00:00:00', 4, 2, NULL, 5, 8);

-- --------------------------------------------------------

--
-- Structure de la table `fonction`
--

DROP TABLE IF EXISTS `fonction`;
CREATE TABLE IF NOT EXISTS `fonction` (
  `idFonction` int(11) NOT NULL AUTO_INCREMENT,
  `Fonction` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idFonction`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `listecodesystemenormal`
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
-- Structure de la table `logs`
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
-- Structure de la table `massebilantaire`
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
-- Structure de la table `pays`
--

DROP TABLE IF EXISTS `pays`;
CREATE TABLE IF NOT EXISTS `pays` (
  `idPays` int(11) NOT NULL AUTO_INCREMENT,
  `pays` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idPays`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `pays`
--

INSERT INTO `pays` (`idPays`, `pays`) VALUES
(1, 'République Démocratique Du Congo');

-- --------------------------------------------------------

--
-- Structure de la table `planamortnormal`
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
-- Structure de la table `plancomptable`
--

DROP TABLE IF EXISTS `plancomptable`;
CREATE TABLE IF NOT EXISTS `plancomptable` (
  `idPlanComptable` int(11) NOT NULL AUTO_INCREMENT,
  `NumCompte` int(10) UNSIGNED DEFAULT NULL,
  `Numclasse` varchar(45) DEFAULT NULL,
  `CompteOperation` varchar(45) DEFAULT NULL,
  `DesiOperation` varchar(45) DEFAULT NULL,
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
  PRIMARY KEY (`idPlanComptable`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `province`
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
-- Déchargement des données de la table `province`
--

INSERT INTO `province` (`idProvince`, `province`, `paysId`) VALUES
(1, 'Kinshasa', 1),
(2, 'Lubumbashi', 1);

-- --------------------------------------------------------

--
-- Structure de la table `renseignementimmo`
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
-- Structure de la table `rubrique`
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
-- Structure de la table `service`
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
-- Structure de la table `souscompte`
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
-- Structure de la table `suiviimmo`
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
-- Structure de la table `taux`
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
-- Structure de la table `user`
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
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`idUser`, `nom`, `role`, `login`, `mpd`, `specialCode`) VALUES
(1, 'Bade', 'admin', 'sertek', '32f251644ee7d5d4109451375d7f179af990e139', NULL),
(2, 'Samuel Wabwana', 'comptable', 'sam001', '91bc92adee53c6ac0725689bc879506ebb415734', '001'),
(3, 'Josue Kalubi', 'comptable', 'jos002', 'c8a98a14afd4623328ed7b570e66ced088222578', '002'),
(4, 'Amedee B-shop', 'consultant', 'ame003', '282e897edf88ef8713415d05d9e6b976114f97ec', '003'),
(5, 'jenny spencer', 'comptable', 'jen007', '9bff1b9d76df413f409bc376222b478dda0c89ff', 'jen007'),
(6, 'aminata', 'consultant', 'amin005', 'c08116bba9333b88d2e50f66da484b777d3ff940', 'amin005'),
(7, 'Nadia Kalumbi', 'comptable', 'ND005', '7b7d8f48fa7afc942e6ab131c12d8d0205b85658', 'ND005'),
(8, 'james', 'comptable', 'ar002', '95e985447d67cc9998c2f7332280b91432c94131', 'ar002');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `agent`
--
ALTER TABLE `agent`
  ADD CONSTRAINT `FK_agent_entreprise` FOREIGN KEY (`EntrepriseId`) REFERENCES `entreprise` (`idEntreprise`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Agent_Fonction` FOREIGN KEY (`FonctionId`) REFERENCES `cicaf`.`fonction` (`idFonction`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Agent_Service` FOREIGN KEY (`ServiceId`) REFERENCES `cicaf`.`service` (`idService`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Agent_commune` FOREIGN KEY (`communeId`) REFERENCES `cicaf`.`commune` (`idCommune`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Agent_user1` FOREIGN KEY (`user_idUser`) REFERENCES `cicaf`.`user` (`idUser`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `balancecloture`
--
ALTER TABLE `balancecloture`
  ADD CONSTRAINT `fk_BalanceCloture_Entreprise1` FOREIGN KEY (`EntrepriseId`) REFERENCES `entreprise` (`idEntreprise`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `budget`
--
ALTER TABLE `budget`
  ADD CONSTRAINT `fk_Budget_CompteAnalityque1` FOREIGN KEY (`CompteAnalityqueId`) REFERENCES `compteanalityque` (`idCompteAnalityque`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Budget_Entreprise1` FOREIGN KEY (`EntrepriseId`) REFERENCES `entreprise` (`idEntreprise`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Budget_PlanComptable1` FOREIGN KEY (`PlanComptableId`) REFERENCES `plancomptable` (`idPlanComptable`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Budget_user1` FOREIGN KEY (`userId`) REFERENCES `cicaf`.`user` (`idUser`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_T10_Budget_CodeProjet1` FOREIGN KEY (`CodeProjetId`) REFERENCES `codeprojet` (`idCodeProjet`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `commune`
--
ALTER TABLE `commune`
  ADD CONSTRAINT `fk_commune_Province` FOREIGN KEY (`ProvinceId`) REFERENCES `province` (`idProvince`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `comptedivisionnaire`
--
ALTER TABLE `comptedivisionnaire`
  ADD CONSTRAINT `fk_CompteDivisionnaire_SousCompte1` FOREIGN KEY (`SousCompte_idSousCompte`) REFERENCES `souscompte` (`idSousCompte`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `comptefamille`
--
ALTER TABLE `comptefamille`
  ADD CONSTRAINT `fk_CompteFamille_CompteDivisionnaire1` FOREIGN KEY (`CompteDivisionnaire_idCompteDivisionnaire`) REFERENCES `comptedivisionnaire` (`idCompteDivisionnaire`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `compteprincipal`
--
ALTER TABLE `compteprincipal`
  ADD CONSTRAINT `fk_ComptePrincipal_Classe1` FOREIGN KEY (`Classe_idClasse`) REFERENCES `classe` (`idClasse`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `corpbalance`
--
ALTER TABLE `corpbalance`
  ADD CONSTRAINT `fk_CorpBalance_BalanceCloture1` FOREIGN KEY (`BalanceClotureId`) REFERENCES `balancecloture` (`idBalanceCloture`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_CorpBalance_PlanComptable1` FOREIGN KEY (`PlanComptableId`) REFERENCES `plancomptable` (`idPlanComptable`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `corpbilannormalise`
--
ALTER TABLE `corpbilannormalise`
  ADD CONSTRAINT `fk_CorpBilanNormalise_EnteteBilanNormal1` FOREIGN KEY (`EnteteBilanNormalId`) REFERENCES `entetebilannormal` (`idEnteteBilanNormal`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_CorpBilanNormalise_ListeCodeSystemeNormal1` FOREIGN KEY (`ListeCodeSystemeNormalId`) REFERENCES `listecodesystemenormal` (`idListeCodeSystemeNormal`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `corpbudget_has_budget`
--
ALTER TABLE `corpbudget_has_budget`
  ADD CONSTRAINT `fk_CorpBudget_has_Budget_Budget1` FOREIGN KEY (`Budget_idBudget`) REFERENCES `budget` (`idBudget`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_CorpBudget_has_Budget_CorpBudget1` FOREIGN KEY (`CorpBudget_idCorpBudget`) REFERENCES `corpbudget` (`idCorpBudget`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `corpbulletin`
--
ALTER TABLE `corpbulletin`
  ADD CONSTRAINT `fk_CorpBulletin_EnteteBul1` FOREIGN KEY (`EnteteBulId`) REFERENCES `entetebul` (`idEnteteBul`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_CorpBulletin_Rubrique1` FOREIGN KEY (`RubriqueId`) REFERENCES `rubrique` (`idRubrique`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_CorpBulletin_user1` FOREIGN KEY (`userId`) REFERENCES `cicaf`.`user` (`idUser`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `corpmouv`
--
ALTER TABLE `corpmouv`
  ADD CONSTRAINT `fk_CorpMouv_PlanComptable1` FOREIGN KEY (`PlanComptable_idPlanComptable`) REFERENCES `plancomptable` (`idPlanComptable`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_T8_CorpMouv_T7_EnteteMouv1` FOREIGN KEY (`NumMouv`) REFERENCES `entetemouv` (`idEntetMouv`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `donneecomptableimmo`
--
ALTER TABLE `donneecomptableimmo`
  ADD CONSTRAINT `fk_DonneeComptableImmo_Entreprise1` FOREIGN KEY (`Entreprise_idEntreprise`) REFERENCES `entreprise` (`idEntreprise`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_DonneeComptableImmo_RenseignementImmo1` FOREIGN KEY (`RenseignementImmoId`) REFERENCES `renseignementimmo` (`idRenseignementImmo`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `entetebilannormal`
--
ALTER TABLE `entetebilannormal`
  ADD CONSTRAINT `fk_EnteteBilanNormal_Entreprise1` FOREIGN KEY (`EntrepriseId`) REFERENCES `entreprise` (`idEntreprise`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `entetebul`
--
ALTER TABLE `entetebul`
  ADD CONSTRAINT `fk_EnteteBul_Agent1` FOREIGN KEY (`AgentId`) REFERENCES `agent` (`idAgent`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_EnteteBul_Taux1` FOREIGN KEY (`TauxId`) REFERENCES `cicaf`.`taux` (`idTaux`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `entetemouv`
--
ALTER TABLE `entetemouv`
  ADD CONSTRAINT `fk_EnteteMouv_CategorieJournaux1` FOREIGN KEY (`CategorieJournaux_idCategorieJournaux`) REFERENCES `categoriejournaux` (`idCategorieJournaux`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_EnteteMouv_Entreprise1` FOREIGN KEY (`EntrepriseId`) REFERENCES `entreprise` (`idEntreprise`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_EnteteMouv_user1` FOREIGN KEY (`userId`) REFERENCES `cicaf`.`user` (`idUser`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `entreprise`
--
ALTER TABLE `entreprise`
  ADD CONSTRAINT `fk_Entreprise_Entreprise1` FOREIGN KEY (`entitede`) REFERENCES `entreprise` (`idEntreprise`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `listecodesystemenormal`
--
ALTER TABLE `listecodesystemenormal`
  ADD CONSTRAINT `fk_ListeCodeSystemeNormal_MasseBilantaire1` FOREIGN KEY (`MasseBilantaireId`) REFERENCES `massebilantaire` (`idMasseBilantaire`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `logs`
--
ALTER TABLE `logs`
  ADD CONSTRAINT `fk_Logs_user1` FOREIGN KEY (`user_idUser`) REFERENCES `user` (`idUser`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `planamortnormal`
--
ALTER TABLE `planamortnormal`
  ADD CONSTRAINT `fk_PlanAmortNormal_RenseignementImmo1` FOREIGN KEY (`RenseignementImmo_idRenseignementImmo`) REFERENCES `renseignementimmo` (`idRenseignementImmo`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `province`
--
ALTER TABLE `province`
  ADD CONSTRAINT `fk_Province_pays1` FOREIGN KEY (`paysId`) REFERENCES `pays` (`idPays`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `souscompte`
--
ALTER TABLE `souscompte`
  ADD CONSTRAINT `fk_SousCompte_ComptePrincipal1` FOREIGN KEY (`ComptePrincipal_idComptePrincipal`) REFERENCES `compteprincipal` (`idComptePrincipal`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `suiviimmo`
--
ALTER TABLE `suiviimmo`
  ADD CONSTRAINT `fk_SuiviImmo_RenseignementImmo1` FOREIGN KEY (`RenseignementImmoId`) REFERENCES `renseignementimmo` (`idRenseignementImmo`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
