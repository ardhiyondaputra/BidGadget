<?php

class TestDataManager
{
    private string $seedFile =
        __DIR__ . '/../backend/data/seed/bids_seed.json';

    private string $activeFile =
        __DIR__ . '/../backend/data/bids.json';

    public function resetDatabase(): void
    {
        copy(
            $this->seedFile,
            $this->activeFile
        );
    }
}