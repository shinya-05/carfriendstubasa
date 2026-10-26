<?php

namespace Tests\Feature;

use Tests\TestCase;

class AssessmentPageRemovedTest extends TestCase
{
    public function test_assessment_page_is_not_available(): void
    {
        $this->get('/assessment')->assertNotFound();
        $this->post('/assessment/submit')->assertNotFound();
    }

    public function test_homepage_has_no_assessment_page_link(): void
    {
        $this->get('/')
            ->assertOk()
            ->assertDontSee('/assessment', false)
            ->assertDontSee('ASSESSMENT');
    }
}
