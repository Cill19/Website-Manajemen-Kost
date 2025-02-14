<?php

namespace App\Http\Controllers;

use App\Interface\BoardingHouseRepositoryInterface;
use App\Interface\CityRepositoryInterface;
use Illuminate\Http\Request;

class CityController extends Controller
{
    private BoardingHouseRepositoryInterface $boardingHouseRepository;
    private CityRepositoryInterface $cityRepository;

    public function __construct(
        BoardingHouseRepositoryInterface $boardingHouseRepository,
        CityRepositoryInterface $cityRepository
    ) {
        $this->boardingHouseRepository = $boardingHouseRepository;
        $this->cityRepository = $cityRepository;
    }

    public function show($slug)
    {
        // Ambil data kota berdasarkan slug
        $city = $this->cityRepository->getCityBySlug($slug);

        // Ambil daftar kos berdasarkan kota
        $boardingHouses = $this->boardingHouseRepository->getBoardingHouseByCitySlug($slug);

        return view('pages.city.show', compact('city', 'boardingHouses'));
    }
}
