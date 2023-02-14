
-- --------------------------------------------------------
ALTER TABLE `db_user` CHANGE `id` `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Tabellenstruktur für Tabelle `todo`
--

CREATE TABLE `todo` (
                        `id` int(11) NOT NULL,
                        `headline` varchar(255) NOT NULL,
                        `description` text NOT NULL,
                        `created_at` datetime NOT NULL DEFAULT current_timestamp(),
                        `user_id` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `todo`
--
ALTER TABLE `todo`
    ADD PRIMARY KEY (`id`),
  ADD KEY `user_news` (`user_id`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--


--
-- AUTO_INCREMENT für Tabelle `todo`
--
ALTER TABLE `todo`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints der exportierten Tabellen
--

--
-- Constraints der Tabelle `todo`
--
ALTER TABLE `todo`
    ADD CONSTRAINT `user_news` FOREIGN KEY (`user_id`) REFERENCES `db_user` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

