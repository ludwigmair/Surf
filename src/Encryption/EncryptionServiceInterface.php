<?php
namespace TYPO3\Surf\Encryption;

/*                                                                        *
 * This script belongs to the TYPO3 project "TYPO3 Surf"                  *
 *                                                                        *
 *                                                                        */

/**
 * Encryption service for key generation and encryption / decryption of data.
 */
interface EncryptionServiceInterface
{
    /**
     * Generate a key pair with optional passphrase
     *
     * @param string $passphrase A passphrase to encrypt the private key
     * @return KeyPair
     */
    public function generateKeyPair($passphrase = null);

    /**
     * Open (decrypt) a protected key pair
     *
     * @param KeyPair $keyPair
     * @param string $passphrase
     * @return KeyPair
     */
    public function openKeyPair(KeyPair $keyPair, $passphrase);

    /**
     * Change the passphrase of a protected key pair
     *
     * @param KeyPair $keyPair
     * @param string $oldPassphrase
     * @param string $newPassphrase
     * @return KeyPair
     */
    public function changePassphrase($keyPair, $oldPassphrase, $newPassphrase);

    /**
     * Encrypt data with a public key
     *
     * @param string $data Unencrypted data
     * @param string $publicKey A public key
     * @return string The encrypted data
     */
    public function encryptData($data, $publicKey);

    /**
     * Decrypt data with an open private key
     *
     * @param string $data Encrypted data
     * @param string $privateKey An open private key
     * @return string The unencrypted data
     */
    public function decryptData($data, $privateKey);
}
