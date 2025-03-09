<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration

{
    public function up(): void
    {
        Schema::create('article_author', function (Blueprint $table) {
            # por convenção, Laravel assume que a chave estrangeira é a tabela seguida de _id
            # onDelete('cascade') deleta os registros relacionados quando o registro pai é deletado somente da tabela de relacionamento
            $table->foreignId('article_id')->constrained()->onDelete('cascade');
            $table->foreignId('author_id')->constrained()->onDelete('cascade');
            # Unique - um artigo não pode ter o mesmo autor mais de uma vez na tabela de relacionamento
            $table->unique(['article_id', 'author_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('article_author');
    }
};
