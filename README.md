# 🧠 AI Article Summarizer (Laravel + HuggingFace)

A lightweight Laravel application that uses the **HuggingFace Inference API** to summarize long articles or texts.

This project demonstrates:

- Integration with external AI services
- Clean architecture & maintainable code
- Automated testing & mocking external requests

---

## ✨ Motivation

I built this project to show my ability and enthusiasm for working with **modern AI technologies**, and to demonstrate that I can quickly learn, integrate, and deliver features using new tools and frameworks.

---

## 🚀 Features

- REST API endpoint for text summarization
- Uses `facebook/bart-large-cnn` model from HuggingFace
- Supports long articles & continuous text
- Feature tests using `Http::fake()`
- Modular structure (Controller + Service + Test)
- Easy to extend with additional models or endpoints

---

## 🏗 Architecture

```text
app/
├── Actions/
│   └── SummarizeArticleAction.php
├── Domain/
│   └── Interfaces/
│       └── SummarizerInterface.php
├── Http/
│   └── Controllers/
│       └── SummarizeController.php
├── Services/
│   └── SummarizeService.php

tests/
└── Feature/
    └── SummarizeTest.php
    
```

### Responsibilities

| Layer      | Responsibility                                       |
|----------- |------------------------------------------------------|
| Controller | Handles request validation and HTTP response         |
| Action     | Coordinates flow and delegates to Domain/Service     |
| Domain     | Defines business interfaces & abstractions           |
| Service    | Calls HuggingFace API and applies business logic     |
| Test       | Fakes the API and verifies expected behavior         |
---

## 🔧 Environment Variables

Add to `.env`:

```text
HUGGINGFACE_API_TOKEN=your-token-here
HUGGINGFACE_MODEL=facebook/bart-large-cnn
```
---

## 📦 Installation

```bash
git clone <repo-url>
cd project
composer install
cp .env.example .env
php artisan key:generate
```
---
## ▶ How to Use

### Call the endpoint
**POST** `/api/summarize`

Example body:
```json
{

"text": "paste your long article text here"

}
```

Response example:
```json
{

"summary": "This is a short summary..."

}
```
---

## 🧪 Testing

Test uses `Http::fake()` to simulate the HuggingFace response.

### Run all tests
```bash
php artisan test
```
