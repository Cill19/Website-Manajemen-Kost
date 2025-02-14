<?php

namespace App\Http\Controllers;

use App\Interface\BoardingHouseRepositoryInterface;
use App\Interface\CategoryRepositoryInterface;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    private BoardingHouseRepositoryInterface $boardingHouseRepository;
    private CategoryRepositoryInterface $categoryRepository;

    public function __construct(
        BoardingHouseRepositoryInterface $boardingHouseRepository,
        CategoryRepositoryInterface $categoryRepository
    ) {
        $this->boardingHouseRepository = $boardingHouseRepository;
        $this->categoryRepository = $categoryRepository;
    }

    public function show($slug)
    {
        // Ambil kategori berdasarkan slug
        $category = $this->categoryRepository->getCategoryBySlug($slug);

        // Ambil daftar kos berdasarkan kategori
        $boardingHouses = $this->boardingHouseRepository->getBoardingHouseByCategorySlug($slug);

        return view('pages.category.show', compact('category', 'boardingHouses'));
    }
}
