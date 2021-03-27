<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Contact;
use Carbon\Carbon;

class everyWeek extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'week:delete';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This will delete contact older than 6 months every week';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        Contact::where('created_at','>',Carbon::now()->subMonths(6))->delete();
    }
}
