<?php

function getListings(): array
{
    return [
        ["titre" => "rocket-league", "price" => "30", "image" => "rocket-league.jpg", "description" => "test description"],
        ["titre" => "rocket-league", "price" => "25", "image" => "rocket-league.jpg", "description" => "test description"],
        ["titre" => "rocket-league", "price" => "28", "image" => "rocket-league.jpg", "description" => "test description"]
    ];
}


function getListingById(int $id): array
{
    $listing = getListings();
    return $listing[$id];
}
