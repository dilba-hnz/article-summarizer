# 🧠 AI Article Processing (Laravel + HuggingFace)

A lightweight Laravel application that provides AI-powered **text summarization and content analysis** using the HuggingFace Inference API.

This project demonstrates:

- Integration with external AI services
- Clean architecture & maintainable code
- Prompt engineering for structured AI responses
- Automated testing & mocking external requests

---

## ✨ Motivation

This project was built to demonstrate my enthusiasm and ability to work with **modern AI technologies**.  
It showcases how I design scalable, testable, and maintainable backend systems while integrating third-party AI services.

---

## 🚀 Features

- 📄 Article summarization endpoint
- 🔍 AI content analysis endpoint
- 🧠 Keyword extraction
- 📊 Structured article insights
- 🤖 Integration with HuggingFace LLM models
- 📚 Supports long-form articles and continuous text
- 🧪 Feature testing using `Http::fake()`
- 🧩 Modular clean architecture
- 🔌 Easily extensible AI processing pipeline

---

## 🏗 Architecture

```text
app/
├── Actions/
│   ├── AnalyzeArticleAction.php
│   └── SummarizeArticleAction.php
│
├── Domain/
│   └── Interfaces/
│       ├── AnalyzerInterface.php
│       ├── LLMResponseParserInterface.php
│       └── SummarizerInterface.php
│
├── Http/
│   ├── Controllers/
│   │   ├── Analyze/
│   │   │   └── AnalyzeController.php
│   │   └── Summaries/
│   │       └── SummarizerController.php
│   │
│   └── Requests/
│       └── TextRequest.php
│
├── Services/
│   ├── AnalyzerService.php
│   ├── LLMResponseParserService.php
│   └── SummarizeService.php
│
tests/
└── Feature/
    ├── AnalyzeTest.php
    └── SummarizeTest.php
```

### Responsibilities

| Layer      | Responsibility                           |
|----------- |------------------------------------------|
| Controller | Handles validation and HTTP response     |
| Action     | Coordinates AI processing workflow       |
| Domain     | Defines contracts and abstractions       |
| Service    | Integrates with HuggingFace API          |
| Parser     | Converts LLM output into structured data |
| Test       | Verifies behavior and mocks external API |
---
## 🧾 LLM Response Parser Service

The `LLMResponseParserService` is responsible for converting semi-structured LLM output into predictable, structured application data.

Since LLM outputs may contain additional formatting or inconsistencies, this service:

- Extracts keywords using pattern matching
- Separates analytical summaries from generated text
- Normalizes LLM output into structured arrays
- Improves reliability of AI integrations

This layer decouples prompt formatting from business logic and allows flexible adaptation if LLM output formats change.

---
## 🔧 Environment Variables

Add the following values to `.env`:

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

### Summarize Article

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

### Analyze Article

**POST** `/api/analyze`

Example body:
```json
{

  "text": "paste article text here"

}
```
Response example:
```json
{
    "keywords": [
        "Artificial Intelligence",
        "Machine Learning",
        "Automation",
        "Backend Systems",
        "Data Processing"
    ],
    "analysis": "The article explains how AI technologies improve backend systems and automation processes."
}
```

---
## 🧾 Prompt Design

The analyzer uses structured prompts to instruct the LLM to return responses in a predictable plain-text format containing:

- Five important keywords
- A short analytical summary

This ensures reliable downstream parsing and structured output generation.

---

## ⚠ Note

The analyzer relies on prompt-structured plain-text responses rather than strict JSON output to improve compatibility with summarization-focused LLM models.

---

## 🧪 Testing

The project uses Laravel `Http::fake()` to isolate external API calls and ensure deterministic test results.

### Run all tests
```bash
php artisan test
```
---

## 🔌 Extensibility

New AI capabilities can be added by:

1. Creating a Domain Interface
2. Implementing a Service
3. Creating an Action
4. Adding an API endpoint
5. Writing Feature Tests

---

## 🧪 Technical Highlights

- Clean Architecture implementation
- Dependency inversion using interfaces
- External AI service integration
- Prompt engineering for structured outputs
- Fully testable design with API mocking

---

## 🤖 Model Choice

The project uses `facebook/bart-large-cnn`, a transformer model optimized for text summarization.

Although primarily designed for summarization, prompt engineering techniques are applied to extract analytical insights and keywords from articles.
