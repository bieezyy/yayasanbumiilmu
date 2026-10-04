<?php
/**
 * Core Helper Functions — Website SMP & Pesantren Yayasan Bumi Ilmu
 */

function get_json_data(string $filename): array {
    $filepath = __DIR__ . '/../data/' . $filename;
    if (!file_exists($filepath)) {
        return [];
    }
    $content = file_get_contents($filepath);
    $data = json_decode($content, true);
    return is_array($data) ? $data : [];
}

function get_site_config(): array {
    static $config = null;
    if ($config === null) {
        $config = get_json_data('site_config.json');
    }
    return $config;
}

function get_ppdb_config(): array {
    static $ppdb = null;
    if ($ppdb === null) {
        $ppdb = get_json_data('ppdb_config.json');
    }
    return $ppdb;
}

function is_active_page(string $pageName, string $currentPage): string {
    return $pageName === $currentPage ? 'text-primary-700 font-semibold border-b-2 border-primary-700' : 'text-slate-600 hover:text-primary-700 font-medium';
}

function is_mobile_active_page(string $pageName, string $currentPage): string {
    return $pageName === $currentPage ? 'bg-primary-50 text-primary-800 font-semibold' : 'text-slate-700 hover:bg-slate-50 font-medium';
}
