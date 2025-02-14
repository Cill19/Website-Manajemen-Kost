<?php

namespace App\Http\Controllers;

use App\Interface\BoardingHouseRepositoryInterface;
use App\Interface\CategoryRepositoryInterface;
use App\Interface\CityRepositoryInterface;
use Illuminate\Http\Request;

class BoardingHouseController extends Controller
{
    private CityRepositoryInterface $cityRepository;
    private CategoryRepositoryInterface $categoryRepository;
    private BoardingHouseRepositoryInterface $boardingHouseRepository;

    public function __construct(
        CityRepositoryInterface $cityRepository,
        CategoryRepositoryInterface $categoryRepository,
        BoardingHouseRepositoryInterface $boardingHouseRepository
    ) {
        $this->cityRepository = $cityRepository;
        $this->categoryRepository = $categoryRepository;
        $this->boardingHouseRepository = $boardingHouseRepository;
    }

    // Menampilkan halaman pencarian
    public function find()
    {
        $cities = $this->cityRepository->getAllCities();
        $categories = $this->categoryRepository->getAllCategories();

        return view('pages.boarding-house.find', compact('cities', 'categories'));
    }

    public function show($slug)
    {
        $boardingHouse = $this->boardingHouseRepository->getBoardingHouseBySlug($slug);

        return view('pages.boarding-house.show', compact('boardingHouse'));
    }

    public function rooms($slug) {
        $boardingHouse = $this->boardingHouseRepository->getBoardingHouseBySlug($slug);
        return view('pages.boarding-house.rooms', compact('boardingHouse'));
    }

    // Menampilkan hasil pencarian
    public function findResults(Request $request)
    {
        $request->validate([
            'search' => 'nullable|string|max:255',
            'city' => 'nullable|string|max:255',
            'category' => 'nullable|string|max:255',
        ]);

        $boardingHouses = $this->boardingHouseRepository->getAllBoardingHouses(
            $request->search,
            $request->city,
            $request->category
        );

        return view('pages.boarding-house.index', compact('boardingHouses'));
    }
}
