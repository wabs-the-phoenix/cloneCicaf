-- --------------------------------------------------------
-- Hôte:                         127.0.0.1
-- Version du serveur:           10.4.18-MariaDB - mariadb.org binary distribution
-- SE du serveur:                Win64
-- HeidiSQL Version:             11.3.0.6295
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Listage de la structure de la base pour cicafdb
CREATE DATABASE IF NOT EXISTS `cicafdb` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `cicafdb`;

-- Listage de la structure de la table cicafdb. agent
CREATE TABLE IF NOT EXISTS `agent` (
  `idAgent` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `EntrepriseId` int(10) unsigned NOT NULL,
  `MatriAgent` varchar(45) DEFAULT NULL,
  `NomAgent` varchar(45) DEFAULT NULL,
  `PostNomAgent` varchar(45) DEFAULT NULL,
  `Prenom` varchar(45) DEFAULT NULL,
  `SexeAgent` enum('F','M') DEFAULT NULL,
  `DateEmbauche` date DEFAULT NULL,
  `DateEmbaucheRel` date DEFAULT NULL,
  `EtatCivil` enum('Marie','celibataire','divorce','veuf') DEFAULT NULL,
  `NomEpouse` varchar(45) DEFAULT NULL,
  `NbreEnfant` smallint(5) unsigned DEFAULT NULL,
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
  KEY `FK_agent_entreprise` (`EntrepriseId`),
  CONSTRAINT `FK_agent_entreprise` FOREIGN KEY (`EntrepriseId`) REFERENCES `entreprise` (`idEntreprise`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_Agent_Fonction` FOREIGN KEY (`FonctionId`) REFERENCES `cicaf`.`fonction` (`idFonction`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_Agent_Service` FOREIGN KEY (`ServiceId`) REFERENCES `cicaf`.`service` (`idService`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_Agent_commune` FOREIGN KEY (`communeId`) REFERENCES `cicaf`.`commune` (`idCommune`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_Agent_user1` FOREIGN KEY (`user_idUser`) REFERENCES `cicaf`.`user` (`idUser`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- Les données exportées n'étaient pas sélectionnées.

-- Listage de la structure de la table cicafdb. balancecloture
CREATE TABLE IF NOT EXISTS `balancecloture` (
  `idBalanceCloture` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `DateBalance` timestamp NULL DEFAULT NULL,
  `ExerciceBalance` decimal(15,2) DEFAULT NULL,
  `EntrepriseId` int(10) unsigned NOT NULL,
  PRIMARY KEY (`idBalanceCloture`),
  KEY `fk_BalanceCloture_Entreprise1_idx` (`EntrepriseId`),
  CONSTRAINT `fk_BalanceCloture_Entreprise1` FOREIGN KEY (`EntrepriseId`) REFERENCES `entreprise` (`idEntreprise`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Les données exportées n'étaient pas sélectionnées.

-- Listage de la structure de la table cicafdb. budget
CREATE TABLE IF NOT EXISTS `budget` (
  `idBudget` int(10) unsigned NOT NULL AUTO_INCREMENT,
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
  `CodeProjetId` int(10) unsigned NOT NULL,
  `EntrepriseId` int(10) unsigned NOT NULL,
  `CompteAnalityqueId` int(10) unsigned NOT NULL,
  `PlanComptableId` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  PRIMARY KEY (`idBudget`),
  KEY `fk_T10_Budget_CodeProjet1_idx` (`CodeProjetId`),
  KEY `fk_Budget_Entreprise1_idx` (`EntrepriseId`),
  KEY `fk_Budget_CompteAnalityque1_idx` (`CompteAnalityqueId`),
  KEY `fk_Budget_PlanComptable1_idx` (`PlanComptableId`),
  KEY `fk_Budget_user1_idx` (`userId`),
  CONSTRAINT `fk_Budget_CompteAnalityque1` FOREIGN KEY (`CompteAnalityqueId`) REFERENCES `compteanalityque` (`idCompteAnalityque`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_Budget_Entreprise1` FOREIGN KEY (`EntrepriseId`) REFERENCES `entreprise` (`idEntreprise`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_Budget_PlanComptable1` FOREIGN KEY (`PlanComptableId`) REFERENCES `plancomptable` (`idPlanComptable`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_Budget_user1` FOREIGN KEY (`userId`) REFERENCES `cicaf`.`user` (`idUser`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_T10_Budget_CodeProjet1` FOREIGN KEY (`CodeProjetId`) REFERENCES `codeprojet` (`idCodeProjet`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Les données exportées n'étaient pas sélectionnées.

-- Listage de la structure de la table cicafdb. categoriejournaux
CREATE TABLE IF NOT EXISTS `categoriejournaux` (
  `idCategorieJournaux` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `CodeJournal` varchar(45) DEFAULT NULL,
  `NomJournal` varchar(45) DEFAULT NULL,
  `RespoJournal` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idCategorieJournaux`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Les données exportées n'étaient pas sélectionnées.

-- Listage de la structure de la table cicafdb. codeprojet
CREATE TABLE IF NOT EXISTS `codeprojet` (
  `idCodeProjet` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `DateDebutProjet` date DEFAULT NULL,
  `DateFinProjet` date DEFAULT NULL,
  `NomBailleur` varchar(45) DEFAULT NULL,
  `NomResponsable` varchar(45) DEFAULT NULL,
  `PersonneCible` varchar(45) DEFAULT NULL,
  `NomProjet` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idCodeProjet`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Les données exportées n'étaient pas sélectionnées.

-- Listage de la structure de la table cicafdb. compteanalityque
CREATE TABLE IF NOT EXISTS `compteanalityque` (
  `idCompteAnalityque` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `DesiAnal` varchar(45) DEFAULT NULL,
  `DateAnal` datetime DEFAULT NULL,
  PRIMARY KEY (`idCompteAnalityque`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Les données exportées n'étaient pas sélectionnées.

-- Listage de la structure de la table cicafdb. corpbalance
CREATE TABLE IF NOT EXISTS `corpbalance` (
  `idCorpBalance` int(10) unsigned NOT NULL AUTO_INCREMENT,
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
  `BalanceClotureId` int(10) unsigned NOT NULL,
  PRIMARY KEY (`idCorpBalance`),
  KEY `fk_CorpBalance_PlanComptable1_idx` (`PlanComptableId`),
  KEY `fk_CorpBalance_BalanceCloture1_idx` (`BalanceClotureId`),
  CONSTRAINT `fk_CorpBalance_BalanceCloture1` FOREIGN KEY (`BalanceClotureId`) REFERENCES `balancecloture` (`idBalanceCloture`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_CorpBalance_PlanComptable1` FOREIGN KEY (`PlanComptableId`) REFERENCES `plancomptable` (`idPlanComptable`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Les données exportées n'étaient pas sélectionnées.

-- Listage de la structure de la table cicafdb. corpbilannormalise
CREATE TABLE IF NOT EXISTS `corpbilannormalise` (
  `idCorpBilanNormalise` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `SoldePrecedent` decimal(15,2) DEFAULT NULL,
  `MontantBrut` decimal(15,2) DEFAULT NULL,
  `AmortProvision` int(11) DEFAULT NULL,
  `MontantNet` decimal(15,2) DEFAULT NULL,
  `TauxMoyen1` decimal(10,2) DEFAULT NULL,
  `TauxMoyen2` decimal(10,2) DEFAULT NULL,
  `EnteteBilanNormalId` int(10) unsigned NOT NULL,
  `ListeCodeSystemeNormalId` int(10) unsigned NOT NULL,
  PRIMARY KEY (`idCorpBilanNormalise`),
  KEY `fk_CorpBilanNormalise_EnteteBilanNormal1_idx` (`EnteteBilanNormalId`),
  KEY `fk_CorpBilanNormalise_ListeCodeSystemeNormal1_idx` (`ListeCodeSystemeNormalId`),
  CONSTRAINT `fk_CorpBilanNormalise_EnteteBilanNormal1` FOREIGN KEY (`EnteteBilanNormalId`) REFERENCES `entetebilannormal` (`idEnteteBilanNormal`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_CorpBilanNormalise_ListeCodeSystemeNormal1` FOREIGN KEY (`ListeCodeSystemeNormalId`) REFERENCES `listecodesystemenormal` (`idListeCodeSystemeNormal`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Les données exportées n'étaient pas sélectionnées.

-- Listage de la structure de la table cicafdb. corpbudget
CREATE TABLE IF NOT EXISTS `corpbudget` (
  `idCorpBudget` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `QtePrevue` decimal(15,2) DEFAULT NULL,
  `LibelleBudgetaire` varchar(45) DEFAULT NULL,
  `ProvisionBudgetaire` decimal(15,2) DEFAULT NULL,
  `ProvisionCumule` decimal(15,2) DEFAULT NULL,
  `Commentaires` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idCorpBudget`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Les données exportées n'étaient pas sélectionnées.

-- Listage de la structure de la table cicafdb. corpbudget_has_budget
CREATE TABLE IF NOT EXISTS `corpbudget_has_budget` (
  `CorpBudget_idCorpBudget` int(10) unsigned NOT NULL,
  `Budget_idBudget` int(10) unsigned NOT NULL,
  KEY `fk_CorpBudget_has_Budget_Budget1_idx` (`Budget_idBudget`),
  KEY `fk_CorpBudget_has_Budget_CorpBudget1_idx` (`CorpBudget_idCorpBudget`),
  CONSTRAINT `fk_CorpBudget_has_Budget_Budget1` FOREIGN KEY (`Budget_idBudget`) REFERENCES `budget` (`idBudget`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_CorpBudget_has_Budget_CorpBudget1` FOREIGN KEY (`CorpBudget_idCorpBudget`) REFERENCES `corpbudget` (`idCorpBudget`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Les données exportées n'étaient pas sélectionnées.

-- Listage de la structure de la table cicafdb. corpbulletin
CREATE TABLE IF NOT EXISTS `corpbulletin` (
  `idCorpBulletin` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `Montant1` decimal(15,2) DEFAULT NULL,
  `Avantage` decimal(15,2) DEFAULT NULL,
  `Retenue` decimal(15,2) DEFAULT NULL,
  `Remuneration` decimal(15,2) DEFAULT NULL,
  `QPPatronale` decimal(15,2) DEFAULT NULL,
  `RubriqueId` int(10) unsigned NOT NULL,
  `userId` int(11) NOT NULL,
  `EnteteBulId` int(10) unsigned NOT NULL,
  PRIMARY KEY (`idCorpBulletin`),
  KEY `fk_CorpBulletin_Rubrique1_idx` (`RubriqueId`),
  KEY `fk_CorpBulletin_user1_idx` (`userId`),
  KEY `fk_CorpBulletin_EnteteBul1_idx` (`EnteteBulId`),
  CONSTRAINT `fk_CorpBulletin_EnteteBul1` FOREIGN KEY (`EnteteBulId`) REFERENCES `entetebul` (`idEnteteBul`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_CorpBulletin_Rubrique1` FOREIGN KEY (`RubriqueId`) REFERENCES `rubrique` (`idRubrique`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_CorpBulletin_user1` FOREIGN KEY (`userId`) REFERENCES `cicaf`.`user` (`idUser`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Les données exportées n'étaient pas sélectionnées.

-- Listage de la structure de la table cicafdb. corpmouv
CREATE TABLE IF NOT EXISTS `corpmouv` (
  `idCorpMouv` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `NumMouv` int(10) unsigned DEFAULT NULL,
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
  KEY `fk_CorpMouv_PlanComptable1_idx` (`PlanComptable_idPlanComptable`),
  CONSTRAINT `fk_CorpMouv_PlanComptable1` FOREIGN KEY (`PlanComptable_idPlanComptable`) REFERENCES `plancomptable` (`idPlanComptable`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_T8_CorpMouv_T7_EnteteMouv1` FOREIGN KEY (`NumMouv`) REFERENCES `entetemouv` (`idEntetMouv`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Les données exportées n'étaient pas sélectionnées.

-- Listage de la structure de la table cicafdb. donneecomptableimmo
CREATE TABLE IF NOT EXISTS `donneecomptableimmo` (
  `idDonneeComptableImmo` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `CoefficientReev` decimal(15,3) DEFAULT NULL,
  `AgeImmo` decimal(15,2) DEFAULT NULL,
  `DateReevaluation` date DEFAULT NULL,
  `ExerciceComptable` varchar(45) DEFAULT NULL,
  `Entreprise_idEntreprise` int(10) unsigned NOT NULL,
  `RenseignementImmoId` int(10) unsigned NOT NULL,
  PRIMARY KEY (`idDonneeComptableImmo`),
  KEY `fk_DonneeComptableImmo_Entreprise1_idx` (`Entreprise_idEntreprise`),
  KEY `fk_DonneeComptableImmo_RenseignementImmo1_idx` (`RenseignementImmoId`),
  CONSTRAINT `fk_DonneeComptableImmo_Entreprise1` FOREIGN KEY (`Entreprise_idEntreprise`) REFERENCES `entreprise` (`idEntreprise`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_DonneeComptableImmo_RenseignementImmo1` FOREIGN KEY (`RenseignementImmoId`) REFERENCES `renseignementimmo` (`idRenseignementImmo`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Les données exportées n'étaient pas sélectionnées.

-- Listage de la structure de la table cicafdb. entetebilannormal
CREATE TABLE IF NOT EXISTS `entetebilannormal` (
  `idEnteteBilanNormal` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `NumeroBilan` varchar(45) DEFAULT NULL,
  `DateBilan` date DEFAULT NULL,
  `DateClotureBilan` date DEFAULT NULL,
  `NomResponsable` varchar(45) DEFAULT NULL,
  `ExerciceComptable` varchar(45) DEFAULT NULL,
  `TauxApplique` decimal(10,2) DEFAULT NULL,
  `EntrepriseId` int(10) unsigned NOT NULL,
  PRIMARY KEY (`idEnteteBilanNormal`),
  KEY `fk_EnteteBilanNormal_Entreprise1_idx` (`EntrepriseId`),
  CONSTRAINT `fk_EnteteBilanNormal_Entreprise1` FOREIGN KEY (`EntrepriseId`) REFERENCES `entreprise` (`idEntreprise`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Les données exportées n'étaient pas sélectionnées.

-- Listage de la structure de la table cicafdb. entetebul
CREATE TABLE IF NOT EXISTS `entetebul` (
  `idEnteteBul` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `MoiSal` varchar(45) DEFAULT NULL,
  `AnneeSal` varchar(45) DEFAULT NULL,
  `NHeureNor` decimal(15,2) DEFAULT NULL,
  `NJours` int(10) unsigned DEFAULT NULL,
  `NJourMaladie` int(10) unsigned DEFAULT NULL,
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
  `AgentId` int(10) unsigned NOT NULL,
  PRIMARY KEY (`idEnteteBul`),
  KEY `fk_EnteteBul_Taux1_idx` (`TauxId`),
  KEY `fk_EnteteBul_Agent1_idx` (`AgentId`),
  CONSTRAINT `fk_EnteteBul_Agent1` FOREIGN KEY (`AgentId`) REFERENCES `agent` (`idAgent`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_EnteteBul_Taux1` FOREIGN KEY (`TauxId`) REFERENCES `cicaf`.`taux` (`idTaux`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Les données exportées n'étaient pas sélectionnées.

-- Listage de la structure de la table cicafdb. entetemouv
CREATE TABLE IF NOT EXISTS `entetemouv` (
  `idEntetMouv` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `DateMouv` date DEFAULT NULL,
  `DateOper` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
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
  `EntrepriseId` int(10) unsigned NOT NULL,
  `userId` int(11) NOT NULL,
  `CategorieJournaux_idCategorieJournaux` int(10) unsigned NOT NULL,
  PRIMARY KEY (`idEntetMouv`),
  KEY `fk_EnteteMouv_Entreprise1_idx` (`EntrepriseId`),
  KEY `fk_EnteteMouv_user1_idx` (`userId`),
  KEY `fk_EnteteMouv_CategorieJournaux1_idx` (`CategorieJournaux_idCategorieJournaux`),
  CONSTRAINT `fk_EnteteMouv_CategorieJournaux1` FOREIGN KEY (`CategorieJournaux_idCategorieJournaux`) REFERENCES `categoriejournaux` (`idCategorieJournaux`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_EnteteMouv_Entreprise1` FOREIGN KEY (`EntrepriseId`) REFERENCES `entreprise` (`idEntreprise`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_EnteteMouv_user1` FOREIGN KEY (`userId`) REFERENCES `cicaf`.`user` (`idUser`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Les données exportées n'étaient pas sélectionnées.

-- Listage de la structure de la table cicafdb. entreprise
CREATE TABLE IF NOT EXISTS `entreprise` (
  `idEntreprise` int(10) unsigned NOT NULL AUTO_INCREMENT,
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
  `EntiteDe` int(10) unsigned NOT NULL,
  `commune_idCommune` int(11) NOT NULL,
  `NIF` varchar(15) DEFAULT NULL,
  `NbreJourTravailParSemaine` smallint(2) DEFAULT NULL,
  `NbreHeureDeTravailParJour` smallint(2) DEFAULT NULL,
  PRIMARY KEY (`idEntreprise`),
  KEY `fk_Entreprise_Entreprise1_idx` (`EntiteDe`),
  KEY `fk_Entreprise_commune1_idx` (`commune_idCommune`),
  CONSTRAINT `fk_Entreprise_Entreprise1` FOREIGN KEY (`EntiteDe`) REFERENCES `entreprise` (`idEntreprise`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_Entreprise_commune1` FOREIGN KEY (`commune_idCommune`) REFERENCES `cicaf`.`commune` (`idCommune`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Les données exportées n'étaient pas sélectionnées.

-- Listage de la structure de la table cicafdb. listecodesystemenormal
CREATE TABLE IF NOT EXISTS `listecodesystemenormal` (
  `idListeCodeSystemeNormal` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `CodeCompte` varchar(45) DEFAULT NULL,
  `DesignationRubrique` varchar(45) DEFAULT NULL,
  `ReferenceSysteme` varchar(45) DEFAULT NULL,
  `Niveau1` varchar(45) DEFAULT NULL,
  `T15_RefSystemeAllege` varchar(45) DEFAULT NULL,
  `MasseBilantaireId` int(10) unsigned NOT NULL,
  PRIMARY KEY (`idListeCodeSystemeNormal`),
  KEY `fk_ListeCodeSystemeNormal_MasseBilantaire1_idx` (`MasseBilantaireId`),
  CONSTRAINT `fk_ListeCodeSystemeNormal_MasseBilantaire1` FOREIGN KEY (`MasseBilantaireId`) REFERENCES `massebilantaire` (`idMasseBilantaire`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Les données exportées n'étaient pas sélectionnées.

-- Listage de la structure de la table cicafdb. massebilantaire
CREATE TABLE IF NOT EXISTS `massebilantaire` (
  `idMasseBilantaire` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `CodeMasse` varchar(45) DEFAULT NULL,
  `DesignationMasse` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idMasseBilantaire`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Les données exportées n'étaient pas sélectionnées.

-- Listage de la structure de la table cicafdb. planamortnormal
CREATE TABLE IF NOT EXISTS `planamortnormal` (
  `idPlanAmortNormal` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `AnneeAnuite` varchar(45) DEFAULT NULL,
  `BaseAmortissement` decimal(15,2) DEFAULT NULL,
  `Annuite` decimal(15,2) DEFAULT NULL,
  `ValeurComptable` decimal(15,2) DEFAULT NULL,
  `Observation` varchar(45) DEFAULT NULL,
  `RenseignementImmo_idRenseignementImmo` int(10) unsigned NOT NULL,
  PRIMARY KEY (`idPlanAmortNormal`),
  KEY `fk_PlanAmortNormal_RenseignementImmo1_idx` (`RenseignementImmo_idRenseignementImmo`),
  CONSTRAINT `fk_PlanAmortNormal_RenseignementImmo1` FOREIGN KEY (`RenseignementImmo_idRenseignementImmo`) REFERENCES `renseignementimmo` (`idRenseignementImmo`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Les données exportées n'étaient pas sélectionnées.

-- Listage de la structure de la table cicafdb. plancomptable
CREATE TABLE IF NOT EXISTS `plancomptable` (
  `idPlanComptable` int(11) NOT NULL AUTO_INCREMENT,
  `NumCompte` int(10) unsigned DEFAULT NULL,
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

-- Les données exportées n'étaient pas sélectionnées.

-- Listage de la structure de la table cicafdb. renseignementimmo
CREATE TABLE IF NOT EXISTS `renseignementimmo` (
  `idRenseignementImmo` int(10) unsigned NOT NULL AUTO_INCREMENT,
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

-- Les données exportées n'étaient pas sélectionnées.

-- Listage de la structure de la table cicafdb. rubrique
CREATE TABLE IF NOT EXISTS `rubrique` (
  `idRubrique` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `CodeRub` varchar(45) DEFAULT NULL,
  `NomRub` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idRubrique`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Les données exportées n'étaient pas sélectionnées.

-- Listage de la structure de la table cicafdb. suiviimmo
CREATE TABLE IF NOT EXISTS `suiviimmo` (
  `idSuiviImmo` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `DateSuivi` date DEFAULT NULL,
  `QteDepart` decimal(15,2) DEFAULT NULL,
  `EtatMateriel` varchar(45) DEFAULT NULL,
  `QteDeplace` decimal(15,2) DEFAULT NULL,
  `CauseDap` varchar(45) DEFAULT NULL,
  `NouveauLieu` varchar(45) DEFAULT NULL,
  `NouveauRespo` varchar(45) DEFAULT NULL,
  `T9_QteInvantaire` decimal(15,2) DEFAULT NULL,
  `RenseignementImmoId` int(10) unsigned NOT NULL,
  PRIMARY KEY (`idSuiviImmo`),
  KEY `fk_SuiviImmo_RenseignementImmo1_idx` (`RenseignementImmoId`),
  CONSTRAINT `fk_SuiviImmo_RenseignementImmo1` FOREIGN KEY (`RenseignementImmoId`) REFERENCES `renseignementimmo` (`idRenseignementImmo`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Les données exportées n'étaient pas sélectionnées.

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
