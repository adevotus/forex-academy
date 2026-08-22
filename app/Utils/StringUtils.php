<?php
namespace App\Utils;

class StringUtils
{
    /**
     * Generate a username from first and last name, e.g. "John Doe" -> "john.doe"
     */
    public static function generateUsername(string $firstName, string $lastName): string
    {
        $username = strtolower(trim($firstName) . '.' . trim($lastName));
        return preg_replace('/[^a-z0-9.]/', '', $username);
    }


    public static function generateRegistrationNumber(string $prefix = 'STD', ?int $sequence = null, ?int $year = null): string
    {
        $year = $year ?? date('Y');
        $sequence = $sequence ?? random_int(1, 999999);
        return sprintf('%s-%d-%06d', strtoupper($prefix), $year, $sequence);
    }

    /**
     * Generate a random alphanumeric string, e.g. for temp passwords or tokens
     */
    public static function generateRandomString(int $length = 10, bool $includeSymbols = false): string
    {
        $chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
        if ($includeSymbols) {
            $chars .= '!@#$%^&*';
        }
        $result = '';
        $max = strlen($chars) - 1;
        for ($i = 0; $i < $length; $i++) {
            $result .= $chars[random_int(0, $max)];
        }
        return $result;
    }

    /**
     * Generate a URL-friendly slug, e.g. "Advanced Web Dev" -> "advanced-web-dev"
     */
    public static function slugify(string $text): string
    {
        $text = strtolower(trim($text));
        $text = preg_replace('/[^a-z0-9]+/', '-', $text);
        return trim($text, '-');
    }

    /**
     * Generate an invoice/receipt number, e.g. "INV-20260822-4821"
     */
    public static function generateInvoiceNumber(string $prefix = 'INV'): string
    {
        return sprintf('%s-%s-%04d', strtoupper($prefix), date('Ymd'), random_int(0, 9999));
    }

    /**
     * Mask sensitive strings, e.g. phone/email for display
     */
    public static function mask(string $value, int $visibleStart = 2, int $visibleEnd = 2, string $maskChar = '*'): string
    {
        $length = strlen($value);
        if ($length <= $visibleStart + $visibleEnd) {
            return str_repeat($maskChar, $length);
        }
        $start = substr($value, 0, $visibleStart);
        $end = substr($value, -$visibleEnd);
        $maskedLength = $length - $visibleStart - $visibleEnd;
        return $start . str_repeat($maskChar, $maskedLength) . $end;
    }
}