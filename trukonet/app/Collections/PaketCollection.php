<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

/**
 * Description of WidgetCollection
 *
 * @author nasywan
 */

namespace App\Collections;

use App\Entities\Widget;
use Tatter\Firebase\Firestore\Collection;

final class PaketCollection extends Collection
{
    public const NAME   = 'paket';
    public const ENTITY = Paket::class;
}

