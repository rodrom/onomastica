<?php

namespace Rodrom\Onomastica\Tests;

use PHPUnit\Framework\TestCase;
use Rodrom\Onomastica\NameNormalizer;

class NameNormalizerTest extends TestCase
{
    public function test_basic_spanish_name_normalization(): void
    {

        $this->assertSame(
            'María Amelia de Austria',
            NameNormalizer::normalize(' María    AMELIA de AUStria')
        );

        $this->assertSame(
            'Francisco Javier de Burgos y del Olmo',
            NameNormalizer::normalize('FRANCISCO JAVIER DE BURGOS Y DEL OLMO   ')
        );

        $this->assertSame(
            'José Navas-Parejo Pérez',
            NameNormalizer::normalize('josé navas-parejo      pérez  '),
        );

        $this->assertSame(
            'José María Díez-Alegría Gutiérrez',
            NameNormalizer::normalize('    JOSé mARÍa  DíEZ-Alegría GUTIérrez     ')
        );
    }

    public function test_basic_catalan_name_normalization(): void
    {
        $n = new NameNormalizer();

        $this->assertSame(
            'Joan de les Fonts',
            NameNormalizer::normalize(' JOAN DE LES FONTS')
        );

        $this->assertSame(
            'Rosa dels Àngels',
            NameNormalizer::normalize('  ROSA DELS    àngels   ')
        );

        $this->assertSame(
            'Josep de l’Horta',
            NameNormalizer::normalize('Josep de L\'Horta  '),
        );

        $this->assertSame(
            'Francesc García i Arteta',
            NameNormalizer::normalize('FRANCESC GARCía   i ARTETA')
        );

        $this->assertSame(
            'Jaume d’Aragó-Urgell i Montferrat',
            NameNormalizer::normalize('JAUME D\'ARAGó-URGELL I MONTFERRAT')
        );
    }

    public function test_basic_foreigner_name_normalization(): void
    {
        $n = new NameNormalizer();

        $this->assertSame(
            'Catherine Fabienne Dorléac',
            NameNormalizer::normalize('CATHERINE    Fabienne DorlÉac')
        );

        $this->assertSame(
            'Luiz Inácio Lula da Silva',
            NameNormalizer::normalize('  Luiz InÁcio LULA da Silva')
        );

        $this->assertSame(
            'Auguste Viktoria Friederike Luise Feodora Jenny von Schleswig-Holstein-Sonderburg-Augustenburg',
            NameNormalizer::normalize('Auguste     VIKTORIA friederike      luIsE   FeoDORa    jennY von Schleswig-Holstein-Sonderburg-Augustenburg')
        );

        $this->assertSame(
            'Pierre des Champs',
            NameNormalizer::normalize('PIERRE DES CHAMPS')
        );

        $this->assertSame(
            'Charles d’Artagnan',
            NameNormalizer::normalize('ChARLES D\'Artagnan   ')
        );
    }
}
