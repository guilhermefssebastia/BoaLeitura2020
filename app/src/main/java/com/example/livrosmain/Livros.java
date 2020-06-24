package com.example.livrosmain;

public class Livros {
    private int codLivro;
    private String tituloLivro;
    private int ISBNlivro;
    private String autor, donoLivro;

    public Livros() {
    }

    public Livros(int codLivro, String tituloLivro, int ISBNlivro, String autor, String donoLivro) {
        this.codLivro = codLivro;
        this.tituloLivro = tituloLivro;
        this.ISBNlivro = ISBNlivro;
        this.autor = autor;
        this.donoLivro = donoLivro;
    }

    public int getCodLivro() {
        return codLivro;
    }

    public void setCodLivro(int codLivro) {
        this.codLivro = codLivro;
    }

    public String getTituloLivro() {
        return tituloLivro;
    }

    public void setTituloLivro(String tituloLivro) {
        this.tituloLivro = tituloLivro;
    }

    public int getISBNlivro() {
        return ISBNlivro;
    }

    public void setISBNlivro(int ISBNlivro) {
        this.ISBNlivro = ISBNlivro;
    }

    public String getAutor() {
        return autor;
    }

    public void setAutor(String autor) {
        this.autor = autor;
    }

    public String getDonoLivro() {
        return donoLivro;
    }

    public void setDonoLivro(String donoLivro) {
        this.donoLivro = donoLivro;
    }
}


