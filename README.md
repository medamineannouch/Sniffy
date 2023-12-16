
# Sniffy

## Overview

Packet Sniffing Application is designed to enable statistical tracking and monitoring of network packets on a computer. The application utilizes WinPcap and Windump.

## Features

- **Real-time Packet Monitoring:** Monitor and analyze network packets in real-time.
- **Statistical Tracking:** Track packet statistics to gain insights into network traffic.
- **User-Friendly Interface:** Web-based interface for easy navigation and interaction.
- **Database Access:** Access captured packets for each user via a connected MySQL database.
- **Export to CSV:** Easily export captured packets in CSV format for further analysis.

## Prerequisites

Before running the application, ensure you have the following installed:

- [WinPcap](https://www.winpcap.org/)
- [Windump](https://www.winpcap.org/windump/)
- Web server environment (e.g., Apache, Nginx) with PHP support


## Installation

1. Install WinPcap on your machine. You can download it [here](https://www.winpcap.org/).

2. Install Windump, a packet dumper. You can find more information and download it [here](https://www.winpcap.org/windump/).

3. Set up a web server environment with PHP support.
4. Import the "users" and "packets" table files into the `sniffy` database in MySQL.
5. Clone this repository:
   ```bash
   git clone https://github.com/medamineannouch/Sniffy.git
   ```
   
   
