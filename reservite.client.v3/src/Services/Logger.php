<?php

namespace App\Services;

class Logger
{
    private $logFile;
    private $logDir;

    public function __construct($logDir = __DIR__ . '/../../logs')
    {
        $this->logDir = $logDir;
        $this->logFile = $this->logDir . '/app.log';
        
        // Verifica si la rotación es necesaria
        $this->rotateLogFile();
        
        // Si el archivo de log no existe para el día actual, se crea
        if (!file_exists($this->logFile)) {
            file_put_contents($this->logFile, '');
        }
    }

    // Método para registrar información en el log
    public function info($message)
    {
        $this->log('INFO', $message);
    }

    // Método para registrar advertencias
    public function warning($message)
    {
        $this->log('WARNING', $message);
    }

    // Método para registrar errores
    public function error($message)
    {
        $this->log('ERROR', $message);
    }

    // Método general para escribir en el log
    private function log($level, $message)
    {
        $date = date('Y-m-d H:i:s');
        $logMessage = "[{$date}] [{$level}] - {$message}\n";
        file_put_contents($this->logFile, $logMessage, FILE_APPEND);
    }

    // Método para rotar el archivo de log al cambiar de día
    private function rotateLogFile()
    {
        $today = date('Y-m-d');
        
        // Si el archivo de log existe
        if (file_exists($this->logFile)) {
            // Leer la última modificación del archivo de log
            $lastModified = date('Y-m-d', filemtime($this->logFile));
            
            // Si la fecha de modificación es diferente a la de hoy, rotar el archivo
            if ($lastModified !== $today) {
                // Renombrar el archivo a app.log.YYYY-MM-DD
                $newLogFile = $this->logDir . "/app.log.{$lastModified}";
                rename($this->logFile, $newLogFile);
            }
        }
    }
}
