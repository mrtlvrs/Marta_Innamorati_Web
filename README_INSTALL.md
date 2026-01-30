# 📦 CrochetHub – Guida all’installazione

Questa guida descrive tutti i passi necessari per installare ed eseguire l’applicazione **CrochetHub** su una nuova macchina in ambiente locale.

L’applicazione utilizza **PHP**, **MySQL** e **Doctrine ORM**.

---

## 🔧 Requisiti di sistema

Assicurarsi di avere installato:

- PHP >= 8.1
- MySQL / MariaDB
- Apache (XAMPP, MAMP o simili)
- Composer
- Estensione PHP: `pdo_mysql`

---

## 📁 Posizionamento del progetto

1. Copiare la cartella del progetto nella document root del server web, ad esempio:

```
htdocs/CrochetHub
```

2. Avviare Apache e MySQL.

---

## 📦 Installazione dipendenze PHP

Dalla root del progetto:

```bash
composer install
```

Questo comando installerà tutte le dipendenze necessarie, incluso Doctrine.

---

## ⚙️ Configurazione del database

Aprire il file:

```
src/Utility/config.php
```

e configurare i parametri di connessione:

```php
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'crochethub');
```

L’utente MySQL deve avere i permessi di **CREATE DATABASE**.

---

## 🗄️ Creazione del database e delle tabelle

L’applicazione fornisce uno script automatico per la creazione del database e dello schema.

### Metodo browser (consigliato)

Aprire:

```
http://localhost/CrochetHub/installer/installer.php
```

Se l’operazione ha successo, verrà mostrato:

```
Database installato correttamente
```

### Metodo terminale

```bash
php installer/installer.php
```

### Cosa fa lo script

- crea il database se non esiste
- crea le tabelle a partire dalle Entity Doctrine
- non sovrascrive database già popolati

---

## 🌱 Popolamento del database

Per inserire dati di esempio:

```bash
php installer/populate_db.php
```

Verranno inseriti:
- utenti di esempio (incluso un amministratore)
- categorie
- materiali e strumenti
- creazioni con immagini
- commenti, like, follow e salvataggi

Al termine:

```
Seed completato con successo.
```

---

## ▶️ Avvio dell’applicazione

Aprire nel browser:

```
http://localhost/CrochetHub/public/
```

L’applicazione è ora pronta all’uso.

---

## ✅ Note finali

- Gli script di installazione vanno eseguiti una sola volta
- Non devono essere richiamati durante il normale utilizzo dell’applicazione
- In caso di errore verificare configurazione DB, permessi e versione PHP
