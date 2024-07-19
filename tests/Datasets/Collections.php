<?php

dataset('collection_ids', collect([
    1010712,
    529892,
    558216,
    531330,
    531241,
    544669,
    618529,
    2150,
    256322,
    173710,
    386382,
    10,
    230,
])->unique()->sort()->values());

dataset('collection_titles', collect([
    'Iron Man',
    'Minions',
    'Shrek',
])->unique()->sort()->values());
