-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : jeu. 09 déc. 2021 à 18:01
-- Version du serveur : 10.4.21-MariaDB
-- Version de PHP : 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `projet`
--

-- --------------------------------------------------------

--
-- Structure de la table `blogs`
--

CREATE TABLE `blogs` (
  `id_blog` int(11) NOT NULL,
  `objet` varchar(100) NOT NULL,
  `description` varchar(100) NOT NULL,
  `date` varchar(50) NOT NULL,
  `image` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `blogs`
--

INSERT INTO `blogs` (`id_blog`, `objet`, `description`, `date`, `image`) VALUES
(35, 'Red Dead Redemption', 'it\'s a very good game', '2021-11-19', 'images/red dead.jpg'),
(38, 'Cookizaa', 'cats', '2021-11-07', 'images/cookiza.JPG'),
(39, 'Coldplay', 'musssic', '2021-11-30', 'images/wp2895167.jpg'),
(40, 'Halloweeeen', 'halllooo', '2021-11-06', 'images/Jack-o\'-Lantern_2003-10-31.jpg'),
(41, 'World Of Warcraft', 'beautifuuul', '2021-11-18', 'images/wow.jpg'),
(42, 'Call of Duty:Warzone', 'recommended', '2021-11-30', 'images/codwz25.jpg'),
(43, 'tarek', 'tarek bien', '2021-07-07', 'images/cookiza.JPG'),
(44, 'sara', 'asasas', '2021-12-01', 'images/cookiza.JPG'),
(45, 'sarrrra', 'rr', '2021-12-02', 'images/cookiza.JPG'),
(46, 'Arduino', 'test', '2021-12-07', 'images/263713155_4910009232377125_5689938983352298748_n.png'),
(47, 'Biscuit', 'bien', '2021-12-07', 'images/d04eb7e5e36bf01e8d663538e335016e.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `carte`
--

CREATE TABLE `carte` (
  `id_carte` int(11) NOT NULL,
  `points` int(11) NOT NULL,
  `statut` int(11) NOT NULL,
  `dateCreation` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `carte`
--

INSERT INTO `carte` (`id_carte`, `points`, `statut`, `dateCreation`) VALUES
(21, 0, 0, '17-05-21');

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

CREATE TABLE `categorie` (
  `id_categorie` int(11) NOT NULL,
  `Typejeux` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `categorie`
--

INSERT INTO `categorie` (`id_categorie`, `Typejeux`) VALUES
(1, 'Action'),
(4, 'Role Play'),
(5, 'mmorpg'),
(6, 'fps'),
(7, 'Battle Royale'),
(8, 'Survival');

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

CREATE TABLE `client` (
  `id_client` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `dateNais` varchar(100) NOT NULL,
  `cin` varchar(8) NOT NULL,
  `email` varchar(50) NOT NULL,
  `mdp` int(50) NOT NULL,
  `reduction` int(11) NOT NULL,
  `carte` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `client`
--

INSERT INTO `client` (`id_client`, `nom`, `prenom`, `dateNais`, `cin`, `email`, `mdp`, `reduction`, `carte`) VALUES
(5, 'aziz', 'khalsi', '10-11-2000', '09891580', 'aziz.khalsi@esprit.tn', 98711711, 0, 21),
(6, 'sarra', 'bs', '26/1/2002', '12345678', 'sara.bs@esprit.tn', 1234567899, 2, 21);

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

CREATE TABLE `commande` (
  `id_commande` int(11) NOT NULL,
  `prix_tot` float NOT NULL,
  `client` int(11) NOT NULL,
  `etat` varchar(100) NOT NULL,
  `nomproduit` varchar(100) NOT NULL,
  `qte` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `commande`
--

INSERT INTO `commande` (`id_commande`, `prix_tot`, `client`, `etat`, `nomproduit`, `qte`) VALUES
(44, 107, 5, 'en cours de traitement', 'New Worlds  ', 5),
(45, 132, 5, 'en cours de traitement', 'Fox Girlss  ', 7);

-- --------------------------------------------------------

--
-- Structure de la table `commentaireblog`
--

CREATE TABLE `commentaireblog` (
  `idCommentaire` int(11) NOT NULL,
  `dateC` varchar(50) DEFAULT NULL,
  `contenuC` varchar(100) NOT NULL,
  `id_blog` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `commentaireblog`
--

INSERT INTO `commentaireblog` (`idCommentaire`, `dateC`, `contenuC`, `id_blog`) VALUES
(54, NULL, 'woow', 35),
(70, NULL, 'tres bien', 42),
(71, NULL, 'bien', 40),
(72, NULL, 'i like it ', 39),
(73, NULL, 'test', 38),
(77, NULL, 'test', 46);

-- --------------------------------------------------------

--
-- Structure de la table `dislikes`
--

CREATE TABLE `dislikes` (
  `id` int(11) NOT NULL,
  `id_blog` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `fournisseur`
--

CREATE TABLE `fournisseur` (
  `id_fournisseur` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `tel` bigint(20) NOT NULL,
  `categorie` int(11) NOT NULL,
  `local` int(11) NOT NULL,
  `img` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `fournisseur`
--

INSERT INTO `fournisseur` (`id_fournisseur`, `nom`, `prenom`, `email`, `tel`, `categorie`, `local`, `img`) VALUES
(8, 'aziz', 'khalsi', 'khalsiaziz@yahoo.fr', 98711711, 1, 1, '7.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `likes`
--

CREATE TABLE `likes` (
  `id` int(11) NOT NULL,
  `id_blog` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `likes`
--

INSERT INTO `likes` (`id`, `id_blog`, `id_user`) VALUES
(16, 46, 4);

-- --------------------------------------------------------

--
-- Structure de la table `local`
--

CREATE TABLE `local` (
  `id_local` int(11) NOT NULL,
  `Nivcompte` varchar(100) NOT NULL,
  `nbcompte` int(11) NOT NULL,
  `nbcompteutilisé` int(11) NOT NULL,
  `etat` float NOT NULL,
  `email_du_compte` varchar(50) NOT NULL,
  `mdp` varchar(11) NOT NULL,
  `dateCreation` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `local`
--

INSERT INTO `local` (`id_local`, `Nivcompte`, `nbcompte`, `nbcompteutilisé`, `etat`, `email_du_compte`, `mdp`, `dateCreation`) VALUES
(1, 'Débutant', 15, 45, 180, 'emailducompte1', 'mdp1', '2000-02-21'),
(19, 'Joueur occasionnel', 15, 45, 200, 'emailducompte2', 'mdp2', '2008-05-21'),
(20, 'Amateur', 20, 60, 250, 'emailducompte3', 'mdp3', '2012-05-21'),
(21, 'Amateur fort', 30, 95, 350, 'emailducompte4', 'mdp4', '2018-06-25'),
(47, 'professionnel', 25, 80, 350, 'emailducompte5', 'mdp5', '2020-02-21'),
(48, 'Niv 0', 26, 80, 250, 'emailducompte6', 'mdp6', '2019-02-21');

-- --------------------------------------------------------

--
-- Structure de la table `panier`
--

CREATE TABLE `panier` (
  `idpanier` int(11) NOT NULL,
  `imgproduit` varchar(100) NOT NULL,
  `nomproduit` varchar(50) NOT NULL,
  `qte` int(11) NOT NULL,
  `client` int(11) NOT NULL,
  `produit` int(11) NOT NULL,
  `prix` int(11) NOT NULL,
  `local` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `panier`
--

INSERT INTO `panier` (`idpanier`, `imgproduit`, `nomproduit`, `qte`, `client`, `produit`, `prix`, `local`) VALUES
(97, '1.png ', 'New Worlds ', 1, 5, 4, 11, 1);

-- --------------------------------------------------------

--
-- Structure de la table `produit`
--

CREATE TABLE `produit` (
  `id` int(11) NOT NULL,
  `Nomjeux` varchar(50) NOT NULL,
  `prix` float NOT NULL,
  `description` varchar(500) NOT NULL,
  `categorie` int(11) NOT NULL,
  `fournisseur` int(11) NOT NULL,
  `img` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `produit`
--

INSERT INTO `produit` (`id`, `Nomjeux`, `prix`, `description`, `categorie`, `fournisseur`, `img`) VALUES
(4, 'New World', 11, 'good game', 1, 8, '1.png'),
(5, 'Fox Girls', 11.5, 'good game', 1, 8, '2.png'),
(6, 'Bright infinite memory ', 12.5, 'good game', 1, 8, '3.png'),
(7, 'synthic', 13.5, 'good game', 1, 8, '4.png'),
(8, 'Crisi Vr', 11.95, 'good game', 1, 8, '5.png'),
(9, 'Jurrasi world', 14.5, 'good game', 1, 8, '6.png'),
(15, 'Rage destiny', 15.9, 'good game', 1, 8, '10.png'),
(16, 'Terraria', 11.95, 'good game', 1, 8, '11.png');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `cin` int(11) NOT NULL,
  `login_user` varchar(50) NOT NULL,
  `adresse` varchar(50) NOT NULL,
  `mdp_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`cin`, `login_user`, `adresse`, `mdp_user`) VALUES
(9891599, 'khalsiaziz', 'aziz.khalsi@esprit.tn', 123456789),
(12345678, 'sarrabs', 'sarra.bensedrine@esprit.tn', 0),
(23456789, 'jaziritarek', 'tarek.jaziri@esprit.tn', 1);

-- --------------------------------------------------------

--
-- Structure de la table `views`
--

CREATE TABLE `views` (
  `id` int(11) NOT NULL,
  `id_blog` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `views`
--

INSERT INTO `views` (`id`, `id_blog`, `id_user`) VALUES
(32, 46, 3);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id_blog`);

--
-- Index pour la table `carte`
--
ALTER TABLE `carte`
  ADD PRIMARY KEY (`id_carte`);

--
-- Index pour la table `categorie`
--
ALTER TABLE `categorie`
  ADD PRIMARY KEY (`id_categorie`);

--
-- Index pour la table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`id_client`),
  ADD KEY `carte` (`carte`);

--
-- Index pour la table `commande`
--
ALTER TABLE `commande`
  ADD PRIMARY KEY (`id_commande`),
  ADD KEY `client` (`client`);

--
-- Index pour la table `commentaireblog`
--
ALTER TABLE `commentaireblog`
  ADD PRIMARY KEY (`idCommentaire`),
  ADD KEY `FK` (`id_blog`);

--
-- Index pour la table `dislikes`
--
ALTER TABLE `dislikes`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `fournisseur`
--
ALTER TABLE `fournisseur`
  ADD PRIMARY KEY (`id_fournisseur`),
  ADD KEY `fournisseur_ibfk_1` (`categorie`),
  ADD KEY `fournisseur_ibfk_2` (`local`);

--
-- Index pour la table `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `local`
--
ALTER TABLE `local`
  ADD PRIMARY KEY (`id_local`);

--
-- Index pour la table `panier`
--
ALTER TABLE `panier`
  ADD PRIMARY KEY (`idpanier`),
  ADD KEY `client` (`client`),
  ADD KEY `local` (`local`);

--
-- Index pour la table `produit`
--
ALTER TABLE `produit`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fournisseur` (`fournisseur`),
  ADD KEY `categorie` (`categorie`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`cin`);

--
-- Index pour la table `views`
--
ALTER TABLE `views`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id_blog` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT pour la table `carte`
--
ALTER TABLE `carte`
  MODIFY `id_carte` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT pour la table `categorie`
--
ALTER TABLE `categorie`
  MODIFY `id_categorie` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `client`
--
ALTER TABLE `client`
  MODIFY `id_client` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `commande`
--
ALTER TABLE `commande`
  MODIFY `id_commande` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT pour la table `commentaireblog`
--
ALTER TABLE `commentaireblog`
  MODIFY `idCommentaire` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT pour la table `dislikes`
--
ALTER TABLE `dislikes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT pour la table `fournisseur`
--
ALTER TABLE `fournisseur`
  MODIFY `id_fournisseur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT pour la table `likes`
--
ALTER TABLE `likes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT pour la table `local`
--
ALTER TABLE `local`
  MODIFY `id_local` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT pour la table `panier`
--
ALTER TABLE `panier`
  MODIFY `idpanier` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=98;

--
-- AUTO_INCREMENT pour la table `produit`
--
ALTER TABLE `produit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT pour la table `views`
--
ALTER TABLE `views`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `client`
--
ALTER TABLE `client`
  ADD CONSTRAINT `client_ibfk_1` FOREIGN KEY (`carte`) REFERENCES `carte` (`id_carte`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `commande`
--
ALTER TABLE `commande`
  ADD CONSTRAINT `commande_ibfk_1` FOREIGN KEY (`client`) REFERENCES `client` (`id_client`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `commentaireblog`
--
ALTER TABLE `commentaireblog`
  ADD CONSTRAINT `FK` FOREIGN KEY (`id_blog`) REFERENCES `blogs` (`id_blog`);

--
-- Contraintes pour la table `fournisseur`
--
ALTER TABLE `fournisseur`
  ADD CONSTRAINT `fournisseur_ibfk_1` FOREIGN KEY (`categorie`) REFERENCES `categorie` (`id_categorie`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fournisseur_ibfk_2` FOREIGN KEY (`local`) REFERENCES `local` (`id_local`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `panier`
--
ALTER TABLE `panier`
  ADD CONSTRAINT `panier_ibfk_1` FOREIGN KEY (`client`) REFERENCES `client` (`id_client`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `panier_ibfk_2` FOREIGN KEY (`local`) REFERENCES `local` (`id_local`);

--
-- Contraintes pour la table `produit`
--
ALTER TABLE `produit`
  ADD CONSTRAINT `produit_ibfk_1` FOREIGN KEY (`fournisseur`) REFERENCES `fournisseur` (`id_fournisseur`),
  ADD CONSTRAINT `produit_ibfk_2` FOREIGN KEY (`categorie`) REFERENCES `categorie` (`id_categorie`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
