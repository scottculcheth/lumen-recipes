<?php


use App\Gousto\Logic\RecipeValidator;
use PHPUnit\Framework\TestCase;

class RecipeValidatorTest extends TestCase
{
    protected $validator;

    public function setUp()
    {
        $this->validator = new RecipeValidator();
    }

    public function testGoodData()
    {
        $recipe = [
          'title' => 'Title',
          'calories' => 123,
        ];

        $this->validator->validateRecipe($recipe);

        $this->assertTrue(true); // If it doesn't throw Exception, we pass
    }

    public function testBadTitle()
    {
        $recipe = [
            'title' => 123,
            'calories' => 123,
        ];

        $this->expectException(\Symfony\Component\HttpKernel\Exception\BadRequestHttpException::class);
        $this->validator->validateRecipe($recipe);
    }

    public function testBadCalories()
    {
        $recipe = [
            'title' => "Title",
            'calories' => "Calories",
        ];

        $this->expectException(\Symfony\Component\HttpKernel\Exception\BadRequestHttpException::class);
        $this->validator->validateRecipe($recipe);
    }
}
