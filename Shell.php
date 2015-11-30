<?php

/**
 * Shell is a simple class to help php command line scripts
 */
class Shell {

    /**
     * Get confirmation
     * @param string $message
     * @return boolean
     */
    public function confirm($message, $quitOnFalse = TRUE) {
        $confirm = $this->acceptInput($message);
        if ($confirm === 'y' || $confirm === 'yes') {
            return true;
        }
        if( $quitOnFalse ){
            exit($this->printError("\nNo confirmation given, exiting....\n\n"));
        }
        return false;
    }

    /**
     * Accepts user input
     * @param string $prompt
     * @param bool $quitOnFail
     * @return string
     */
    public function acceptInput($prompt, $quitOnFail = TRUE) {
        echo $prompt . "\n";
        $line = fgets(STDIN);

        if (!trim($line) && $quitOnFail) {
            exit($this->printError("\nNo input given, exiting....\n\n"));
        } elseif (!$line) {
            return "";
        }
        return strtolower(trim($line));
    }

    /**
     * Prints error
     * @param type $e
     */
    public function printError($e) {
        echo "\n\n===============================ERROR===============================\n\n";
        echo $e;
        echo "\n\n=============================END ERROR=============================\n\n";
    }

    /**
     * Prints success
     * @param type $e
     */
   public function printSuccess($e) {
        echo "\n\n===============================SUCCESS===============================\n\n";
        echo $e;
        echo "\n\n=============================END SUCCESS=============================\n\n";
    }

}
